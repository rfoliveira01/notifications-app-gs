#!/usr/bin/env sh

npm i
npm run build
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate

if $first_run 
then 
    ./vendor/bin/sail artisan db:seed
fi
./vendor/bin/sail artisan queue:work -v