#!/usr/bin/env sh

./vendor/bin/sail up -d

./vendor/bin/sail artisan migrate

./vendor/bin/sail artisan queue:work -v

#npm i

#npm run dev -d


