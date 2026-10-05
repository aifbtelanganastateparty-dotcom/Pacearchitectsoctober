FROM php:8.3-apache

# Copy the app files to the Apache document root
COPY public/ /var/www/html/

# Make sure apache can bind to Render's dynamic PORT
RUN sed -i 's/80/${PORT}/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# Render passes PORT at runtime, but we set a default just in case
ENV PORT=8080
EXPOSE 8080
