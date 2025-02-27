FROM php:8.2-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install dockerize so we can wait for containers to be ready
ENV DOCKERIZE_VERSION 0.6.1

RUN curl -s -f -L -o /tmp/dockerize.tar.gz https://github.com/jwilder/dockerize/releases/download/v$DOCKERIZE_VERSION/dockerize-linux-amd64-v$DOCKERIZE_VERSION.tar.gz \
    && tar -C /usr/local/bin -xzvf /tmp/dockerize.tar.gz \
    && rm /tmp/dockerize.tar.gz

# Install Composer
ENV COMPOSER_VERSION 2.5.5

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=$COMPOSER_VERSION

# Install nodejs
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
    libz-dev \
    libpq-dev \
    libjpeg-dev \
    libpng-dev \
    libssl-dev \
    libzip-dev \
    unzip \
    zip \
    nodejs \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && apt-get clean \
    && pecl install redis \
    # && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-configure zip \
    && docker-php-ext-install \
    # -j$(nproc) gd \
    exif \
    opcache \
    pdo_mysql \
    pdo_pgsql \
    pgsql \
    pcntl \
    zip \
    bcmath \
    && docker-php-ext-enable redis \
    && rm -rf /var/lib/apt/lists/*;

RUN docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-install -j$(nproc) gd

COPY ./docker/php/laravel.ini /usr/local/etc/php/conf.d/laravel.ini

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user && \
    chown -R $user:$user /var/www

WORKDIR /var/www

ADD . /var/www

#RUN chown -R www-data:www-data .

USER $user