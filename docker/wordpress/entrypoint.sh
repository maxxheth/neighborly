#!/bin/bash
set -e

# Get the UID/GID from environment or default to 1000
USER_ID=${HOST_UID:-1000}
GROUP_ID=${HOST_GID:-1000}

# Update www-data user/group to match host user
if [ "$USER_ID" != "33" ]; then
    echo "Updating www-data to UID:$USER_ID GID:$GROUP_ID"
    
    # Modify www-data group GID
    groupmod -o -g "$GROUP_ID" www-data 2>/dev/null || true
    
    # Modify www-data user UID
    usermod -o -u "$USER_ID" www-data 2>/dev/null || true
    
    # Update PHP-FPM pool config to use www-data (already default, but ensure it)
    sed -i "s/^user = .*/user = www-data/" /usr/local/etc/php-fpm.d/www.conf
    sed -i "s/^group = .*/group = www-data/" /usr/local/etc/php-fpm.d/www.conf
fi

# Set umask for 0664 files and 0775 directories
umask 0002

# Fix ownership of web directory if needed
if [ -d /var/www/html ]; then
    chown -R www-data:www-data /var/www/html 2>/dev/null || true
fi

# Check if WordPress core is installed (Bedrock structure)
if [ ! -d /var/www/html/web/wp ]; then
    echo "WordPress core not found. Installing via WP-CLI..."
    
    # Ensure vendor directory exists (Composer dependencies)
    if [ ! -d /var/www/html/vendor ]; then
        echo "Composer dependencies not found. Running composer install..."
        cd /var/www/html
        composer install --no-dev --optimize-autoloader
    fi
    
    # Double-check if wp directory exists after composer install
    if [ ! -d /var/www/html/web/wp ]; then
        echo "ERROR: WordPress core still missing after composer install."
        echo "Please run 'composer install' in the bedrock directory on your host machine."
    else
        echo "WordPress core installed successfully!"
    fi
fi

echo "Starting services with UID:$USER_ID GID:$GROUP_ID"

# Execute the main command
exec "$@"
