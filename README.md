# Laundry Site

## Requirment

- PHP 8.2
- PHP Composer

## Install

### Clone Repository

```
git clone https://github.com/JuniYadi/laundry.git
```

### Change Directory

```
cd laundry
```

### Install with Composer

```
composer install
```

### Create ENV

Create file `.env` based on `.env.example`

Or Running this command

```
cp .env.example .env
```

### Generate APP Key

```
php artisan key
```

### Create DB and Migration

```
php artisan migrate
```

By default, we will use SQLite3 for DB and store in path `database/database.sqlite`

## Run Application

After following Installation step, to run this app, run this command

```
php artisan serve
```

Open [http://127.0.0.1:8000](http://127.0.0.1:8000) to access the website
