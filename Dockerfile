# Use the official PHP image with Apache
FROM php:8-apache
 
# Set the working directory
WORKDIR /var/www/html
 
# Install required packages
RUN apt-get update && \
    apt-get install -y \
    libonig-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    vim \
    unzip \
    git \
    curl \
    npm \
    iputils-ping
 
# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd
 
# Enable Apache mod_rewrite
RUN a2enmod rewrite
 
# Copy existing application directory contents
COPY . /var/www/html
COPY entrypoint.sh /usr/local/bin/
 
COPY /docker/apache/default.conf /etc/apache2/sites-available/000-default.conf
 
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 775 /var/www/html/storage
 
# Make sure the entrypoint script is executable
RUN chmod +x /usr/local/bin/entrypoint.sh
 
# Install Composer (if needed)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
 
# Install PHP dependencies
RUN composer install --no-interaction --optimize-autoloader
 
# Install NPM dependencies
RUN npm update

RUN npm install
 
# Compile assets
RUN npm run dev
 
# Expose port 80 and start Apache server
EXPOSE 80
CMD ["apache2-foreground"]
 
 ENTRYPOINT [ "/usr/local/bin/entrypoint.sh" ]