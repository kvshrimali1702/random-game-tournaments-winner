# Set up 

Clone this repository.

```sh
git clone https://github.com/kvshrimali1702/random-game-tournaments-winner.git
```

Go to the project's root directory.

```sh
cd random-game-tournaments-winner/
```

Install javascript dependencies & build application.

```sh
npm install && npm run build
```

Clone `.env.example` file to `.env` file. And set proper environment variables.

Install PHP Dependencies

```sh
composer install
```

Generate application key

```sh
php artisan key:generate
```

Migrate all the database migrations.

```sh
php artisan migrate
```

Serve the application on localhost. 

```sh
composer run dev
```
