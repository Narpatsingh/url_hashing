# Getting started

## Installation

Clone the repository

    git clone https://github.com/Narpatsingh/url_hashing.git

Switch to the repo folder

    cd url_hashing

Install all the dependencies using composer

    composer update

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Run the optimize command

    php artisan optimize

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve


**TL;DR command list**

    git clone https://github.com/Narpatsingh/url_hashing.git
    cd url_hashing
    composer update
    cp .env.example .env
    php artisan key:generate 
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve