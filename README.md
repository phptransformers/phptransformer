# PHPTransformer
[![PHPTransformer](logo.png)](#Install)

[![Latest Version](https://img.shields.io/github/release/phptransformers/phptransformer.svg?style=flat-square)](https://github.com/phptransformers/phptransformer/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/phptransformers/phptransformer/master.svg?style=flat-square)](https://travis-ci.org/phptransformers/phptransformer)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/phptransformers/phptransformer.svg?style=flat-square)](https://scrutinizer-ci.com/g/phptransformers/phptransformer/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/phptransformers/phptransformer.svg?style=flat-square)](https://scrutinizer-ci.com/g/phptransformers/phptransformer)
[![Total Downloads](https://img.shields.io/packagist/dt/phptransformers/phptransformers.svg?style=flat-square)](https://packagist.org/packages/phptransformers/phptransformer)

Normalize the API for any PHPTransformer.

## Install

Via Composer

``` bash
$ composer require phptransformers/phptransformer
```

## Usage

``` php
$skeleton = new PhpTransformers\PhpTransformer();
echo $skeleton->echoPhrase('Hello, League!');
```

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Rob Loach](https://github.com/RobLoach)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
