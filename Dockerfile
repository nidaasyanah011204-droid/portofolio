FROM php:8.2-apache

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy source code
COPY . /var/www/html/

# Permissions for storage directory
RUN chown -R www-data:www-data /var/www/html/storage \
    && chmod -R 775 /var/www/html/storage

EXPOSE 80
