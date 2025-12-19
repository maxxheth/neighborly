.PHONY: help up down build rebuild shell wp composer npm logs clean prod-build prod-up setup

# Default target
help: ## Show this help
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-15s\033[0m %s\n", $$1, $$2}'

# =============================================================================
# Development Commands
# =============================================================================

up: ## Start development environment
	docker compose up -d

down: ## Stop all containers
	docker compose down

build: ## Build containers
	docker compose build

rebuild: ## Rebuild containers from scratch
	docker compose build --no-cache

logs: ## View container logs
	docker compose logs -f

logs-wp: ## View WordPress logs
	docker compose logs -f wordpress

logs-node: ## View Node/Vite logs
	docker compose logs -f node

# =============================================================================
# Container Access
# =============================================================================

shell: ## Access WordPress container shell
	docker compose exec wordpress bash

shell-node: ## Access Node container shell
	docker compose exec node sh

# =============================================================================
# WordPress & Composer
# =============================================================================

wp: ## Run WP-CLI commands (usage: make wp c="plugin list")
	docker compose exec wordpress wp $(c) --allow-root

composer: ## Run Composer (usage: make composer c="require wpackagist-plugin/...")
	docker compose exec wordpress composer $(c) -d /var/www/html

composer-install: ## Install Composer dependencies
	docker compose exec wordpress composer install -d /var/www/html

# =============================================================================
# Node & NPM
# =============================================================================

npm: ## Run npm in theme (usage: make npm c="run build")
	docker compose exec node npm $(c)

npm-install: ## Install npm dependencies
	docker compose exec node npm install

npm-build: ## Build production assets
	docker compose exec node npm run build

npm-dev: ## Start Vite dev server
	docker compose exec node npm run dev

# =============================================================================
# Production Commands
# =============================================================================

prod-build: ## Build production images
	docker compose -f docker-compose.yml -f docker-compose.prod.yml build

prod-up: ## Start production environment
	docker compose -f docker-compose.yml -f docker-compose.prod.yml up -d

prod-down: ## Stop production environment
	docker compose -f docker-compose.yml -f docker-compose.prod.yml down

# =============================================================================
# Setup & Utilities
# =============================================================================

setup: ## First-time project setup
	@echo "Setting up CIWG Roots Sage project..."
	@if [ ! -f .env ]; then cp .env.example .env && echo "Created .env file"; fi
	@./scripts/setup.sh

clean: ## Remove all containers, volumes, and build cache
	docker compose down -v --rmi local
	docker builder prune -f

db-export: ## Export database
	docker compose exec wordpress wp db export --allow-root - > backup.sql

db-import: ## Import database (usage: make db-import f="backup.sql")
	docker compose exec -T wordpress wp db import --allow-root - < $(f)
