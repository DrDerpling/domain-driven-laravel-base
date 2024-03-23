### Domains drive laravel base

This project is built with Laravel and is used as a base for future projects. It is a simple project that has some
simple changes to the default Laravel project.

- [Prerequisites](#markdown-header-pre-requisites)
- [Installation](#markdown-header-installation)
- [Building the frontend](#markdown-header-building-the-frontend)
- [Testing](#markdown-header-testing)
- [Features](#markdown-header-features)
- [Domain Structure](#markdown-header-domain-structure)

## Pre-requisites

- Docker
- Docker-compose

## Installation

To make this process easier I recommend using the laravel sail alias. To do this you can add the following alias to your
`.bashrc` or `.zshrc` file:

```bash
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```
### Steps to install the project
1. Clone the repository 
2. Run `composer install` with this command:
``` bash
docker run --rm \
   -u "$(id -u):$(id -g)" \
   -v "$(pwd):/var/www/html" \
   -w /var/www/html \
   laravelsail/php83-composer:latest \
   composer install --ignore-platform-reqs
 ```
3. Copy the `.env.example` file to `.env` and fill in the necessary information
4. Start laravel sail with the following command:
``` bash
sail up -d

# or if you don't have the alias
./vendor/bin/sail up -d
```
5. Generate the application key with the following command:
``` bash
sail artisan key:generate

# or if you don't have the alias
./vendor/bin/sail artisan key:generate
```
6. Run the migrations with the following command:
``` bash
sail artisan migrate

# or if you don't have the alias
./vendor/bin/sail artisan migrate
```
7. Run the seeders with the following command:
``` bash
sail artisan db:seed

# or if you don't have the alias
./vendor/bin/sail artisan db:seed
```


## Building the frontend
1. Run npm install with the following command:
``` bash
sail npm install

# or if you don't have the alias
./vendor/bin/sail npm install
```
2. Run npm run dev with the following command:
``` bash
sail npm run dev

# or if you don't have the alias
./vendor/bin/sail npm run dev
```

## Testing
1. Run the tests with the following command:
``` bash
sail artisan test

# or if you don't have the alias
./vendor/bin/sail artisan test
```

## Domain Structure
```
Domains
└── Product
    ├── Console
    │   └── Commands
    │       └── ProductSyncCommand.php
    ├── Events
    ├── Database
    │   ├── Factories
    │   ├── Migrations
    │   └── Seeders
    ├── Exceptions
    ├── Http
    │   ├── Controllers
    │   │   ├── ProductController.php
    │   │   └── ProductDetailController.php
    │   ├── Middleware
    │   └── Requests
    │       └── ProductRequest.php
    ├── Jobs
    │   └── ProductSync.php
    ├── Models
    │   └── Product.php
    ├── Providers
    ├── Repositories
    │   └── ProductRepository.php
    ├── Tests
    │   ├── Feature
    │   │   ├── ProductControllerTest.php
    │   │   └── ProductDetailControllerTest.php
    │   └── Unit
    │       └── ProductRepositoryTest.php
    │   └── Integration
    │       └── ProductSyncTest.php 
    ├── resources
    │   ├── css
    │   ├── js
    │   └── views
    │       └── product // This is the domain name and should be the same as the domain name
    │           └── home.blade.php
    ├── routes
    │   ├── web.php
    │   ├── api.php
    └── Services
```
