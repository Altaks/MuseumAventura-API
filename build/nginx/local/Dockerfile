FROM forge-registry.iut-larochelle.fr/nginx/nginx-1.23.3

# Copy nginx config
COPY ./build/nginx/local/default.conf /etc/nginx/conf.d/default.conf

# Create de app directory
RUN mkdir /app
