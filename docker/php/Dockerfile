FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    jpegoptim optipng pngquant gifsicle \
    vim \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    libzip-dev \
    libexif-dev \
    libonig-dev

WORKDIR /var/www/SistemaMesas

# REMOVE OS ARQUIVOS DE INDICE DE PACOTE APOS A INSTALACAO
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# INSTALANDO EXTENSOES NECESSÁRIAS PARA TRABALHAR COM O POSTGRES
RUN docker-php-ext-install pdo pdo_pgsql mbstring zip exif pcntl
RUN docker-php-ext-install gd

# INSTALANDO O COMPOSER
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# CRIA UM USUARIO WWW DE BAIXA PERMISSAO
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# COPIANDO OS ARQUIVOS DO SISTEMA LOCAL PARA O DIRETÓRIO WWW
COPY --chown=www:www . /var/www/SistemaMesas

# INSTALANDO DEPENDENCIAS DO COMPOSER
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# AJUSTANDO PERMISSOES
RUN chown -R www:www /var/www/SistemaMesas
RUN chmod -R 755 /var/www/SistemaMesas

# TROCANDO PARA O USUARIO WWW
USER www

# EXPONDO A PORTA 9000 PARA CONTAINER DO PHP
EXPOSE 9000

CMD ["php-fpm"]