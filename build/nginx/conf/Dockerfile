FROM forge-registry.iut-larochelle.fr/php-fpm-composer/iutlr-info-php8.2-fpm-composer2

WORKDIR /app/sfapi
COPY ./sfapi /app/sfapi
RUN composer install --no-interaction


FROM forge-registry.iut-larochelle.fr/nginx/nginx-1.23.3

COPY --from=0 /app/sfapi/public /app/sfapi/public
COPY ./build/nginx/conf/prod.conf /etc/nginx/conf/default.conf