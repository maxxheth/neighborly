# =============================================================================
# Stage 1: Composer dependencies
# =============================================================================
FROM composer:2 AS composer

WORKDIR /app

COPY bedrock/composer.json bedrock/composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts

# =============================================================================
# Stage 2: Base PHP image
# =============================================================================
FROM php:8.4-fpm AS base

# Install system dependencies
RUN apt-get update && apt-get install -y \
	nginx \
	supervisor \
	curl \
	less \
	libfreetype6-dev \
	libjpeg62-turbo-dev \
	libpng-dev \
	libwebp-dev \
	libzip-dev \
	libicu-dev \
	libonig-dev \
	unzip \
	&& rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
	&& docker-php-ext-install -j$(nproc) \
	gd \
	mysqli \
	pdo_mysql \
	zip \
	intl \
	opcache \
	mbstring \
	exif

# Install WP-CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
	&& chmod +x wp-cli.phar \
	&& mv wp-cli.phar /usr/local/bin/wp

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Ensure www-data owns the web directory
RUN mkdir -p /var/www/html && chown -R www-data:www-data /var/www/html

# Copy Nginx configuration
COPY docker/wordpress/nginx.conf /etc/nginx/sites-available/default

# Copy supervisor configuration
COPY docker/wordpress/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy and setup entrypoint script for dynamic UID/GID mapping
COPY docker/wordpress/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

WORKDIR /var/www/html

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

# =============================================================================
# Stage 3: Development image
# =============================================================================
FROM base AS development

# Install Xdebug for development
RUN pecl install xdebug \
	&& docker-php-ext-enable xdebug

# Development PHP settings
RUN echo "memory_limit = 512M" >> /usr/local/etc/php/conf.d/docker-php-dev.ini \
	&& echo "upload_max_filesize = 64M" >> /usr/local/etc/php/conf.d/docker-php-dev.ini \
	&& echo "post_max_size = 64M" >> /usr/local/etc/php/conf.d/docker-php-dev.ini \
	&& echo "max_execution_time = 600" >> /usr/local/etc/php/conf.d/docker-php-dev.ini \
	&& echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-dev.ini

# Xdebug configuration
RUN echo "[xdebug]" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
	&& echo "xdebug.mode=develop,debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
	&& echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
	&& echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# =============================================================================
# Stage 4: Production image
# =============================================================================
FROM base AS production

# Copy Composer dependencies from stage 1
COPY --from=composer /app/vendor /var/www/html/vendor

# Production PHP settings
RUN echo "memory_limit = 256M" >> /usr/local/etc/php/conf.d/docker-php-prod.ini \
	&& echo "upload_max_filesize = 64M" >> /usr/local/etc/php/conf.d/docker-php-prod.ini \
	&& echo "post_max_size = 64M" >> /usr/local/etc/php/conf.d/docker-php-prod.ini \
	&& echo "max_execution_time = 300" >> /usr/local/etc/php/conf.d/docker-php-prod.ini \
	&& echo "display_errors = Off" >> /usr/local/etc/php/conf.d/docker-php-prod.ini \
	&& echo "log_errors = On" >> /usr/local/etc/php/conf.d/docker-php-prod.ini

# OPcache optimization
RUN echo "opcache.memory_consumption=128" >> /usr/local/etc/php/conf.d/docker-php-prod.ini \
	&& echo "opcache.interned_strings_buffer=8" >> /usr/local/etc/php/conf.d/docker-php-prod.ini \
	&& echo "opcache.max_accelerated_files=10000" >> /usr/local/etc/php/conf.d/docker-php-prod.ini \
	&& echo "opcache.revalidate_freq=0" >> /usr/local/etc/php/conf.d/docker-php-prod.ini \
	&& echo "opcache.validate_timestamps=0" >> /usr/local/etc/php/conf.d/docker-php-prod.ini
