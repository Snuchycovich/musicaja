FROM php:7.3-fpm-stretch

WORKDIR /var/www

RUN apt-get update && \
    apt-get install -y -f -m libpq-dev \
    libzip-dev \
    libicu-dev \
    gnupg gnupg2 \
    apt-transport-https \
    ca-certificates \
    curl \
    software-properties-common \
    apt-utils \
    xauth \
    git \
    zip \
    --no-install-recommends

RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql \
    && docker-php-ext-configure mbstring --enable-mbstring

RUN docker-php-ext-install \
        opcache \
        pdo \
        pdo_mysql mysqli \
        sockets \
        intl \
        mbstring \
        zip

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash - && \
    curl -sL https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
    apt-get update && \
    apt-get -y install nodejs yarn

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

CMD ["php-fpm"]
