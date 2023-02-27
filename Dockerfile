FROM ubuntu:22.04

ENV TZ=America/Argentina/Buenos_Aires

RUN apt-get update && \
    apt-get install -y tzdata sed && \
    ln -fs /usr/share/zoneinfo/America/Argentina/Buenos_Aires /etc/localtime && \
    dpkg-reconfigure --frontend noninteractive tzdata

# Actualizamos e instalamos las dependencias necesarias
RUN apt-get update && apt-get install -y \
    curl \
    wget \
    unzip \
    git \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    zlib1g-dev

# Instalamos PHP 8.2 y sus extensiones necesarias
RUN apt-get install -y software-properties-common && \
    add-apt-repository -y ppa:ondrej/php && \
    apt-get update && \
    apt-get install -y \
    php8.2 \
    php8.2-bcmath \
    php8.2-curl \
    php8.2-gd \
    php8.2-mbstring \
    php8.2-mysql \
    php8.2-pgsql \
    php8.2-xml \
    php8.2-fpm \
    php8.2-zip \
    nginx

RUN sed -i 's/;date.timezone =/date.timezone = "America\/Argentina\/Buenos_Aires"/g' /etc/php/8.2/fpm/php.ini && \
    sed -i 's/;date.timezone =/date.timezone = "America\/Argentina\/Buenos_Aires"/g' /etc/php/8.2/cli/php.ini

# Configuramos PHP
COPY ./php.ini /etc/php/8.2/fpm/php.ini

# Instalamos WordPress
RUN curl -O https://wordpress.org/latest.tar.gz && \
    tar -zxvf latest.tar.gz && \
    rm latest.tar.gz && \
    mv wordpress /var/www/html && \
    chown -R www-data:www-data /var/www/html/wordpress

# Configuramos nginx
COPY ./wordpress.conf /etc/nginx/sites-available/wordpress.conf
RUN ln -s /etc/nginx/sites-available/wordpress.conf /etc/nginx/sites-enabled/ && \
    rm /etc/nginx/sites-enabled/default

# Exponemos el puerto 80
EXPOSE 80

# Establecemos las variables de entorno necesarias para conectarse a la base de datos
ENV WORDPRESS_DB_HOST=192.168.1.75:13306 \
    WORDPRESS_DB_USER=nombre_de_usuario \
    WORDPRESS_DB_PASSWORD=contraseña \
    WORDPRESS_DB_NAME=nombre_de_la_base_de_datos

# Copiamos los archivos del proyecto a la raíz del servidor web
COPY ./ /var/www/html/wordpress

# Establecemos los permisos adecuados
RUN chown -R www-data:www-data /var/www/html

# Iniciamos PHP-FPM y nginx en primer plano
CMD service php8.2-fpm start && nginx -g "daemon off;"
