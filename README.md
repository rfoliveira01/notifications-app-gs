## Notification App

This application was made using Laravel and VueJS;

To run the application for the first time run the following commands after cloning the repository: 

```
npm i
npm run build
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate:fresh
./vendor/bin/sail artisan db:seed
./vendor/bin/sail artisan queue:work -v
```

If you're not running for the first time you just need to run:

```
./vendor/bin/sail up -d
./vendor/bin/sail artisan queue:work -v
```