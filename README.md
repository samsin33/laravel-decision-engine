
## Introduction

Decision Engine package for laravel. This package provide support for making decision engine in laravel version 9.

## Installation
Just install samsin33/laravel-decision-engine package with composer.

```bash
$ composer require samsin33/laravel-decision-engine
```

## Database Migration
Decision Engine service provider registers its own database migration directory, so remember to migrate your database after installing the package. The migrations will add 3 tables to your database:

```bash
$ php artisan migrate
```

If you need to overwrite the migrations that ship with this package, you can publish them using the vendor:publish Artisan command:

```bash
$ php artisan vendor:publish --tag="decision-engine-migrations"
```

If you would like to prevent Decision Engine's migrations from running entirely, you may use the ignoreMigrations method provided by Razorpay. Typically, this method should be called in the register method of your AppServiceProvider:

```bash
use Samsin33\DecisionEngine\DecisionEngine;

/**
 * Register any application services.
 *
 * @return void
 */
public function register()
{
    DecisionEngine::ignoreMigrations();
}
```

## Env Configuration

You can change your database connection for models, default will be your DB_CONNECTION if not then mysql. If you wish to change this you can specify a different connection in your .env file:

```bash
DECISION_ENGINE_CONNECTION=mysql
```

You can change your database primary key type for models, default is bigInt. If you wish to change this to uuid you can specify it in your .env file.

For now only ***bit integer*** and ***uuid*** is supported.

```bash
DECISION_ENGINE_PRIMARY_KEY_TYPE=uuid
```
