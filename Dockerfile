#Imagem do build composer
FROM php:7.2-fpm-alpine as builder-composer
COPY . /var/www/html
WORKDIR /var/www/html

RUN apk add git
#Install Composer
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer 

#Install dependencies through composer
RUN composer install --no-scripts --prefer-dist

FROM php:7.2-fpm-alpine
RUN apk --update add --no-cache \
        php7 \
        php7-ctype \
        php7-curl \
        php7-dom \
        php7-fpm \
		php7-fileinfo \
        php7-json \
        php7-mbstring \
        php7-mcrypt \
        php7-opcache \
        php7-openssl \
        php7-phar \
        php7-session \
        php7-tokenizer \
        php7-gd \
		php7-xml \
		php7-xmlwriter

RUN apk add apache2 php7-apache2 tzdata

COPY --from=builder-composer /var/www/html /var/www/html

WORKDIR /var/www/html

#Ajusta o timezone
RUN echo "America/Sao_Paulo" > /etc/timezone
RUN echo '\ndate.timezone = "America/Sao_Paulo"\n' > /usr/local/etc/php/conf.d/devsetup.ini


# config do Apache
RUN sed -i "s/#LoadModule\ rewrite_module/LoadModule\ rewrite_module/" /etc/apache2/httpd.conf \
    && sed -i "s/#LoadModule\ session_module/LoadModule\ session_module/" /etc/apache2/httpd.conf \
    #&& sed -i "s/#LoadModule\ session_cookie_module/LoadModule\ session_cookie_module/" /etc/apache2/httpd.conf \
    #&& sed -i "s/#LoadModule\ session_crypto_module/LoadModule\ session_crypto_module/" /etc/apache2/httpd.conf \
    && sed -i "s/#LoadModule\ deflate_module/LoadModule\ deflate_module/" /etc/apache2/httpd.conf \
    && sed -i "s#^DocumentRoot \".*#DocumentRoot \"/var/www/html/public\"#g" /etc/apache2/httpd.conf \
    && sed -i "s#/var/www/localhost/htdocs#/var/www/html/public#" /etc/apache2/httpd.conf \
    && printf "\n<Directory \"/var/www/html/public\">\n\tAllowOverride All\n</Directory>\n" >> /etc/apache2/httpd.conf

RUN php artisan config:cache

WORKDIR /var/www/html/public/

CMD chown -R apache:apache /var/www/html/storage && httpd -D FOREGROUND

