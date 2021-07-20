# Dockerfile
FROM php:7.4-apache

# Copy apache configuration
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# Copy application source
COPY src /var/www/
RUN chown -R www-data:www-data /var/www
CMD ["start-apache"]
