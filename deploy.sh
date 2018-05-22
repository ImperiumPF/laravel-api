#!/bin/sh

# ativar manutencao
php artisan down

# atualizar codigo
git pull origin master

# atualizar composer
composer install --no-interaction --no-dev --prefer-dist

# atualizar base de dados
php artisan migrate:refresh --seed

# parar manutencao
php artisan up