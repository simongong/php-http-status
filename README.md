# php-http-status
[![Build Status](https://travis-ci.org/wyixin/php-http-status.svg)](https://travis-ci.org/wyixin/php-http-status)

Utility to interact with HTTP status code.

## GETTING THE CODE

### Github
```
git clone git@github.com:wyixin/php-http-status.git
```

### Composer
composer.json: Project Setup
```
{
    "require": {
        "php-http-status/httpstatuscode": "dev-master"
    }
}
```

Install
```
composer install
```

## GETTING STARTED
```
<?php
require "src/Http/index.php";
```
or
```
<?php
require 'vendor/autoload.php';
```

## USAGE
test.php
```
var_dump(Http\_Continue);
var_dump(Http\_Switching_Protocols);
var_dump(Http\Switching_Protocols);
var_dump(Http\Ok);
```

## RUN TESTS
use phpunit
```
phpunit tests
```

## TODO
