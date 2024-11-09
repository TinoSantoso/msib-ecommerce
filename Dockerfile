# Use a PHP 8.2 image with FPM
FROM php:8.2-fpm

# Install Nginx and necessary PHP extensions
RUN apt-get update && apt-get install -y \
    nginx \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory
WORKDIR /var/www/html

# Copy the application code to the container
COPY . .

# Copy the custom Nginx site configuration file
COPY conf/nginx/nginx-site.conf /etc/nginx/sites-available/default

# Update PHP-FPM to listen on 127.0.0.1:9000 instead of the default socket
RUN echo "listen = 127.0.0.1:9000" >> /usr/local/etc/php-fpm.d/zz-docker.conf

# Set environment variables
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV WEBROOT /var/www/html/public

# Set permissions for Laravel storage and cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80 for Nginx
EXPOSE 80

# Start Nginx and PHP-FPM
CMD service nginx start && php-fpm
