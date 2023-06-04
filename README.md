# Laundry Site

## Requirment

- PHP 8.2
- PHP Composer

### Install PHP & Composer

#### Windows

- PHP

1. Download Latest PHP 8.2 at [https://windows.php.net/download/](https://windows.php.net/download/)
2. Create Folder `C:/php` and extract ZIP in here
3. Add this folder to $PATH System

- Composer

1. Download Latest Composer at [https://getcomposer.org/download/](https://getcomposer.org/download/)
2. And select PHP Location in `C:/php`

#### Mac OS

When using Mac, preferer using HomeBrew (Support Intel or ARM Processor)


```
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
brew install php
brew install composer
```

#### Linux Ubuntu

- PHP 8.2

```
sudo apt update
sudo apt install lsb-release ca-certificates apt-transport-https software-properties-common -y
sudo add-apt-repository ppa:ondrej/php
sudo apt-get install php8.2-{mysql,mbstring,curl,zip,xml,fpm,redis,gd,cli,common} -y
```

- Composer

```
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer
```

## Install Application

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
php artisan key:generate
```

### Create DB and Seeds Data

```
php artisan migrate --seed
```

By default, we will use SQLite3 for DB and store in path `database/database.sqlite`

## Run Application

After following Installation step, to run this app, run this command

```
php artisan serve
```

Open [http://127.0.0.1:8000](http://127.0.0.1:8000) to access the website

### Login Access

#### Administrator

- Email: admin@example.com
- Password: password

#### Employee

- Email: karyawan@example.com
- Password: password
