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

echo "Starting services with UID:$USER_ID GID:$GROUP_ID"

# Execute the main command
exec "$@"
