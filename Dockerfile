# Usar a imagem base oficial do PHP 8.1 com Apache
FROM php:8.1-fpm

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar arquivos do Laravel para o container
COPY . /var/www/html

# Permitir ao usuário www-data (o padrão do Nginx) o controle do diretório
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Expor a porta 9000 que o PHP-FPM irá usar
EXPOSE 9000

CMD ["php-fpm"]
