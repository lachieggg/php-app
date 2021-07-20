# Dockerfile
FROM php:7.4-apache

# Copy apache configuration
COPY apache/000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite


# Copy bash script
COPY ./apache/apache-start /usr/local/bin

# Add modules
RUN a2enmod rewrite

# Copy application source
COPY src /var/www/
RUN chown -R www-data:www-data /var/www/

CMD ["apache-start"]
