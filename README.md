# StringFunctions

PHP Utilities to manipulate strings


#Usage

```php
<?php
use Ianlet\StringFunctions\StringFunctions;

// Format a string to a snake case string
$snakeCase = StringFunctions::snakeCase($string);

// Generate the slug of a string with a given delimiter (default delimiter is '-')
$slug = StringFunctions::slug($string, $delimiter);
```

## Installation


You can install StringFunctions with Composer:

```json
{
    "require": {
        "ianlet/stringfunctions": "1.*"
    }
}
```

Run `composer install` or `composer update` and you're ready to start.
