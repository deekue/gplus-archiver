FROM php:7.2-apache

EXPOSE 80

###########################
# gplus-archiver settings
# API key
ENV GAPI_API_KEY=

# OAUTH
ENV GAPI_CLIENT_ID=
ENV GAPI_CLIENT_SECRET=

ENV TIMEOUT_MINUTES=3
ENV ARCHIVE_DIRECTORY=/archive
VOLUME ["/archive"]

###########################
# gplus-archiver install
COPY . /var/www/
COPY public/ /var/www/html/
COPY lib/docker.php /var/www/lib/secret.php
RUN mkdir -m 1777 /var/www/logs

# used by public/.htaccess
RUN a2enmod rewrite

# install Composer dependencies
RUN apt-get update \
    && apt-get install -y --no-install-recommends git zip unzip

# this is awful but the base image prevents 'apt-get install composer'
WORKDIR /var/www
RUN curl --silent --show-error https://getcomposer.org/installer | php \
    && php composer.phar install

# Clean up APT when done.
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
