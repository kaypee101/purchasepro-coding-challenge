## Programmer

-   Kenneth Paul Ebron

## About Purchase Pro Coding Challenge

Implement an online e-commerce system with 3 Microservices:

-   Catalog - Enables users to list all available products in the catalog and see details of a single product.
-   Checkout - Enables users to place an order for a single product.
-   Email - Emails the order summary to the user.

## Project setup

The project uses Laravel 10 + Sail to initialize the application. Developed in WSL + Docker Environment.

#### Plugins used for ease of development

-   Laravel Snippets
-   Laravel Blade Snippets
-   Laravel Blade Formatter
-   Laravel Extra Intellisense
-   PHP Intelephense
-   Docker
-   Git Graph
-   GitLense
-   Colorful Comments

#### Install WSL (https://ubuntu.com/tutorials/install-ubuntu-on-wsl2-on-windows-11-with-gui-support#1-overview)

-   wsl --install # run in terminal
-   open Microsoft Store and download Ubuntu # Ubuntu wull be installed in your machine
-   wsl -d Ubuntu
-   sudo apt update

#### Install Docker and Makefile

-   sudo apt-get install build-essential
-   /bin/bash -c "$(curl -fsSL https://git.io/JDGfm)"

#### Clone Project

-   git clone https://github.com/kaypee101/purchasepro-coding-challenge.

#### Install Docker Image, Container, Composer and NPM Packages

-   sudo service docker start
-   #### **_ START - added new update _**
-   docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd)/api:/var/www/html" -w /var/www/html laravelsail/php82-composer:latest composer install --ignore-platform-reqs
-   #### **_ END- added new update _**
-   ./vendor/bin/sail up -d
-   cp .env.example .env
-   ./vendor/bin/sail composer install
-   ./vendor/bin/sail npm install
-   ./vendor/bin/sail npm run dev

#### Migrate and Seed

-   ./vendor/bin/sail artisan migrate:fresh --seed

#### Seeded Admin Account

-   admin@admin.admin
-   p@ssword1234
