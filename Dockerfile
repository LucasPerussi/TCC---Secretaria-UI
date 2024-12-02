FROM php:8.2-apache

RUN a2enmod rewrite headers

WORKDIR /var/www/html/secretaria

COPY . .

EXPOSE 80

CMD ["apache2-foreground"]
