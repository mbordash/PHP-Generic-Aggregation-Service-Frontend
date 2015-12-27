FROM ubuntu

MAINTAINER Michael Bordash <michael@internetdj.com>

ENV MONGO_PHP_VERSION 1.6.12

# Copy your site to your public url
COPY ./ /var/www/www.squaretable.io

# Install apache, PHP and a variety of dependencies
ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update && \
    apt-get -yq install \
        wget \
        curl \
        git \
        make \
        apache2 \
        libapache2-mod-php5 \
        php5 \
        php5-dev \
        php5-gd \
        php5-curl \
        php5-redis \
        php5-mcrypt \
        php-pear \
        php-apc && \
    rm -rf /var/lib/apt/lists/*

RUN sed -i "s/variables_order.*/variables_order = \"EGPCS\"/g" /etc/php5/apache2/php.ini
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install the Mongo Client for PHP
RUN pecl install mongo-$MONGO_PHP_VERSION && \
    mkdir -p /etc/php5/mods-available && \
    echo "extension=mongo.so" > /etc/php5/mods-available/mongo.ini && \
    ln -s /etc/php5/mods-available/mongo.ini /etc/php5/cli/conf.d/mongo.ini && \
    ln -s /etc/php5/mods-available/mongo.ini /etc/php5/apache2/conf.d/mongo.ini && \
    ln -s /etc/php5/mods-available/mcrypt.ini /etc/php5/cli/conf.d/mcrypt.ini && \
    ln -s /etc/php5/mods-available/mcrypt.ini /etc/php5/apache2/conf.d/mcrypt.ini

# Enable standard apache mods
RUN a2enmod rewrite
RUN a2enmod headers

# Set the apache environment variables
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

# Add your custom Apache config for your site
ADD apache-config.conf /etc/apache2/sites-enabled/000-default.conf

VOLUME ["/var/log/apache2"]

# Install new relic php agent
# RUN (wget -O - https://download.newrelic.com/548C16BF.gpg | apt-key add - && \
#  sh -c 'echo "deb http://apt.newrelic.com/debian/ newrelic non-free" > /etc/apt/sources.list.d/newrelic.list' && \
#  apt-get update && \
#  DEBIAN_FRONTEND=noninteractive apt-get install -y newrelic-php5 && \
#  apt-get clean)

#RUN sudo newrelic-install install

#RUN echo newrelic-php5 newrelic-php5/application-name string "www.squaretable.io" | debconf-set-selections
#RUN echo newrelic-php5 newrelic-php5/license-key string "7f104c37fd196f99d98a73cc86c1e720e084643b"

EXPOSE 80

CMD ["/usr/sbin/apache2", "-D", "FOREGROUND"]
# CMD ["/etc/init.d/newrelic-sysmond start"]
