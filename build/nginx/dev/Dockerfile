FROM forge-registry.iut-larochelle.fr/nginx/nginx-1.23.3

# Copy nginx config
COPY ./build/nginx/dev/default.conf /etc/nginx/conf.d/default.conf

# Create de app directory
RUN mkdir /app

# Copy resources
COPY ./resources/dev/ /usr/share/nginx/html/resources/

RUN chown -R www-data:www-data /usr/share/nginx/html/
RUN chmod -R 755 /usr/share/nginx/html/