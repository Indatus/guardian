# Guardian
 
Guardian is a Laravel package that allows you to protect more than just the `production` environment from potentially destructive tasks.

<img src="https://s3.amazonaws.com/uploads.hipchat.com/64994/600576/uStJyocBGHUKxPf/Screen%20Shot%202015-02-09%20at%207.41.32%20AM.png"/>

---

[![Latest Stable Version](https://poser.pugx.org/indatus/guardian/v/stable.png)](https://packagist.org/packages/indatus/guardian) [![Total Downloads](https://poser.pugx.org/indatus/guardian/downloads.png)](https://packagist.org/packages/indatus/guardian) [![Build Status](https://travis-ci.org/Indatus/guardian.png?branch=master)](https://travis-ci.org/Indatus/guardian)

<a name="features" />
## Features

 * Adds confirmation dialog for destructive commands to configurable environment list
 
Supported artisan commands:

 * `migrate:refresh`
 * `migrate:reset`
 * `db:seed`
 
<a name="installation" />
## Installation

**Requirements**

 * PHP 5.4+ or [HHVM](http://hhvm.com/)
 * [Laravel](http://laravel.com) 4.1+

You can install the library via [Composer](http://getcomposer.org) by running:

````
composer require indatus/guardian
````

Add this line to the providers array in your `app/config/app.php` file :

```php
        'Indatus\Guardian\ServiceProvider',
```
 
<a name="configuration" />
## Configuration

By default this package adds protection for a `demo` environment in addition to Laravel's native `production` protection.  You can customize this environment list by customizing the package config.
 
For Laravel 4: `php artisan config:publish indatus/guardian`
 
For Laravel 5+: `php artisan publish:config indatus/guardian`