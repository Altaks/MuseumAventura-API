FROM forge-registry.iut-larochelle.fr/nginx/nginx-1.23.3

# Copy nginx config
COPY --from=0 /app/sfapi/public /app/sfapi/public
COPY ./build/nginx/conf/prod.conf /etc/nginx/conf.d/default.conf

# Create de app directory
RUN mkdir /app
