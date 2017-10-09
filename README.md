# xmarcos/php-cs-fixer-config

[![Build Status](https://img.shields.io/travis/xmarcos/php-cs-fixer-config/master.svg?style=flat-square)](https://travis-ci.org/xmarcos/php-cs-fixer-config)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/xmarcos/php-cs-fixer-config/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/xmarcos/php-cs-fixer-config/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/xmarcos/php-cs-fixer-config.svg?style=flat-square)](https://scrutinizer-ci.com/g/xmarcos/php-cs-fixer-config)
[![Latest Version](https://img.shields.io/packagist/v/xmarcos/php-cs-fixer-config.svg?style=flat-square)](https://packagist.org/packages/xmarcos/php-cs-fixer-config)
[![Software License](https://img.shields.io/packagist/l/xmarcos/php-cs-fixer-config.svg?style=flat-square)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/xmarcos/php-cs-fixer-config.svg?style=flat-square)](https://packagist.org/packages/xmarcos/php-cs-fixer-config)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/44da8393-8260-4eda-9189-42cb56a92c6c/mini.png)](https://insight.sensiolabs.com/projects/44da8393-8260-4eda-9189-42cb56a92c6c)

A [`PHP Coding Standards Fixer`](http://github.com/FriendsOfPHP/PHP-CS-Fixer) config with the rules i use in all my projects to verify and enforce coding standards.

## Requirements

PHP needs to be a minimum version of PHP `5.6.0`.

## Installation

```bash
composer require --dev xmarcos/php-cs-fixer-config
```

## Usage

Create a configuration file `.php_cs.dist` in the root of your project:

```php
<?php

$config = new xmarcos\PhpCsFixer\Config\Php56();

$config
    ->setUsingCache(true)
    ->getFinder()
    ->in(__DIR__);

return $config;
```

> ⚠️ If `setUsingCache` is set to `true`, add `.php_cs.cache` to `.gitignore`.

The default [Finder](http://symfony.com/doc/current/components/finder.html) configuration is:

```php
$finder
    ->files()
    ->name('*.php')
    ->name('*.phpt')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
    ->exclude('vendor');
```

To enforce a `header_comment` pass a `string` to the constructor of the config:

```php
$header = <<<'EOF'
(c) 2017 Marcos Sader.

For the full copyright and license information, please view
the LICENSE file that was distributed with this source code.
EOF;

$config = new xmarcos\PhpCsFixer\Config\Php56($header);

...
```

## Fixing Issues

### Using Composer Scripts

You can use [Composer Scripts ](https://getcomposer.org/doc/articles/scripts.md) to run the fixer:


```json
"scripts": {
    "cs": "php-cs-fixer fix --config=.php_cs.dist -v --diff --dry-run",
    "cs-fix": "php-cs-fixer fix --config=.php_cs.dist -v --diff"
}
```

And then run:

```bash
# to run the rules but not change/fix any files.
composer cs

# to change/fix files.
composer cs-fix
```
## Credits

Inspired by [refinery29/php-cs-fixer-config](https://github.com/refinery29/php-cs-fixer-config).

## License

MIT License
