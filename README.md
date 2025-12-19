# CIWG Roots Sage - Dockerized Bedrock + Sage WordPress

A production-ready, Dockerized WordPress development environment using [Bedrock](https://roots.io/bedrock/) and [Roots Sage](https://roots.io/sage/) with Tailwind CSS 4.1.

## Stack

- **WordPress 6.9** via Bedrock
- **Sage 11** theme with Blade templates
- **Tailwind CSS 4.1** via `@tailwindcss/vite`
- **PHP 8.4** with Nginx
- **MySQL 8.0**
- **Vite** for asset bundling with HMR
- **Traefik** reverse proxy
- **WP-CLI** for WordPress management

## Quick Start

### Prerequisites

- Docker & Docker Compose
- Make (optional, for convenience commands)

### Setup

1. **Clone and configure environment:**
   ```bash
   cp .env.example .env
   # Edit .env with your desired domain and database credentials
   
   cp bedrock/.env.example bedrock/.env
   # Edit bedrock/.env with the same database credentials
   ```

2. **Add domain to hosts file:**
   ```bash
   echo "127.0.0.1 ciwg-roots-sage.local" | sudo tee -a /etc/hosts
   ```

3. **Build and start containers:**
   ```bash
   make up
   # or: docker compose up -d
   ```

4. **Install dependencies:**
   ```bash
   # Composer (if not already installed)
   make composer-install
   
   # npm for theme assets
   make npm-install
   ```

5. **Access WordPress:**
   - Site: http://ciwg-roots-sage.local
   - Admin: http://ciwg-roots-sage.local/wp/wp-admin
   - Vite Dev: http://localhost:5173

## Development Commands

```bash
make up              # Start containers
make down            # Stop containers
make logs            # View all logs
make shell           # Access WordPress shell
make wp c="..."      # Run WP-CLI commands
make composer c="..."# Run Composer
make npm c="..."     # Run npm in theme
make npm-build       # Build production assets
```

## Directory Structure

```
ciwg-roots-sage/
├── docker-compose.yml           # Base configuration
├── docker-compose.override.yml  # Development overrides
├── docker-compose.prod.yml      # Production overrides
├── Makefile                     # Developer commands
├── docker/
│   ├── wordpress/               # PHP-FPM + Nginx
│   └── node/                    # Vite dev server
└── bedrock/                     # WordPress installation
    └── web/app/themes/sage/     # Sage theme
```

## Production Deployment

```bash
# Build production assets
make npm-build

# Build production images
make prod-build

# Deploy
make prod-up
```

## License

MIT
