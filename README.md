# Consolidate

[![Latest Version](https://img.shields.io/github/release/robloach/consolidate.svg?style=flat-square)](https://github.com/robloach/consolidate/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/RobLoach/consolidate/master.svg?style=flat-square)](https://travis-ci.org/RobLoach/consolidate)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/robloach/consolidate.svg?style=flat-square)](https://scrutinizer-ci.com/g/robloach/consolidate/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/robloach/consolidate.svg?style=flat-square)](https://scrutinizer-ci.com/g/robloach/consolidate)
[![Total Downloads](https://img.shields.io/packagist/dt/robloach/consolidate.svg?style=flat-square)](https://packagist.org/packages/robloach/consolidate)

Template engine consolidation library for PHP, inspired by [Consolidate.js](https://github.com/tj/consolidate.js).


## Install

Via Composer

``` bash
$ composer require robloach/consolidate
```

## Supported template engines

* [Smarty](http://smarty.net)
* [Twig](http://twig.sensiolabs.org)


## API

``` php
$twig = new RobLoach\Consolidate\TwigEngine();
$template = file_get_contents('page.html');
$html = $twig->render($template, array('name' => 'Linus'));
```

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Rob Loach](https://github.com/robloach)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
