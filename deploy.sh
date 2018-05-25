#!/bin/sh

# ativar manutencao
php artisan down --message="Upgrading Website" --retry=60

# atualizar codigo
git pull origin master

# atualizar composer
composer install --no-interaction --no-dev --prefer-dist

# atualizar base de dados
php artisan migrate:refresh --seed

# parar manutencao
php artisan up