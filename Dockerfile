FROM php:8.0.2-apache AS builder

#install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

#install node
RUN curl -sL https://deb.nodesource.com/setup_15.x | bash - \
      && apt-get install -y nodejs

#install all the system dependencies and enable PHP modules 
RUN apt-get update && apt-get install -y \
      libicu-dev \
      libpq-dev \
      libmcrypt-dev \
      libonig-dev \
      libzip-dev \
      git \
      zip \
      unzip \
    && rm -r /var/lib/apt/lists/* \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-install \
      intl \
      mbstring \
      pcntl \
      pdo_mysql \
      pdo_pgsql \
      pgsql \
      zip \
      opcache

#set our application folder as an environment variable
ENV APP_HOME /var/www/html

#copy source files and run composer
COPY ./ $APP_HOME

#install all PHP dependencies
RUN composer install --no-interaction
#build frond end
RUN node -v \
  && npm -v \
  && npm install \
  && npm run prod

FROM php:8.0.2-apache
#install all the system dependencies and enable PHP modules 
RUN apt-get update && apt-get install -y \
      libicu-dev \
      libpq-dev \
      libmcrypt-dev \
      libonig-dev \
      libzip-dev \
      git \
      zip \
      unzip \
    && rm -r /var/lib/apt/lists/* \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-install \
      intl \
      mbstring \
      pcntl \
      pdo_mysql \
      pdo_pgsql \
      pgsql \
      zip \
      opcache

COPY migrate.sh /usr/local/bin/migrate.sh
COPY --from=builder /var/www/html/ /var/www/html/

#change uid and gid of apache to docker user uid/gid
# RUN usermod -u __HOST_USER_ID__ www-data && groupmod -g __HOST_GROUP_ID__ www-data

#change the web_root to laravel /var/www/html/public folder
RUN sed -i -e "s/html/html\/public/g" /etc/apache2/sites-enabled/000-default.conf

#enable apache module rewrite
RUN a2enmod rewrite headers

# COPY docker-php-entrypoint.sh /usr/local/bin/docker-php-entrypoint

#change ownership of our applications
RUN chown -R www-data:www-data /var/www/html/storage
RUN chown -R www-data:www-data /var/www/html/bootstrap

#migrate data
ARG MIGRATION=migrate
RUN echo ${MIGRATION} \
  && /usr/local/bin/migrate.sh ${MIGRATION}

