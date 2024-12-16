FROM forge-registry.iut-larochelle.fr/nginx/nginx-1.23.3

WORKDIR ./sfapi
COPY ./sfapi /app/sfapi
RUN composer install --no-interaction

# Copy nginx config
COPY  ./sfapi/public /app/sfapi/public
COPY ./build/nginx/conf/prod.conf /etc/nginx/conf.d/default.conf

# Create de app directory
RUN mkdir /app

