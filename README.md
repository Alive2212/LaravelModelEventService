# LaravelModelEventService

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practices by being named the following.

```
src/
tests/
```


## Install

Via Composer

``` bash
$ composer require Alive2212/LaravelModelEventService
```

## Usage
 Base Observer Help to create event listener simple

1- Create your own Observer file and locate it into app/Observers

2- Extend it from BaseObserver form this Package

3- Override boot method in your Model what you want to track events

4- Put following code into "boot" of your model after "parent::boot();"
```php
Order2::observe(Order2Observer::class);
```
5- add what event you want into event service provider with this convention
``` php
'App\Events\{Model}{Method}Event' => [
'App\Listeners\{Model}{Method}Listener',
]
```
6- generate events

7- extend all event with 'BaseModelEvent' or 'BaseModelPivotEvent' and remove all class code

8- get model in listener class with following command
```php
$event->getModel();
```

``` php
$skeleton = new Alive2212\LaravelModelEventService();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email alive2212@yahoo.com instead of using the issue tracker.

## Credits

- [Babak Nodoust][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/Alive2212/LaravelModelEventService.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/Alive2212/LaravelModelEventService/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/Alive2212/LaravelModelEventService.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Alive2212/LaravelModelEventService.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/Alive2212/LaravelModelEventService.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/Alive2212/LaravelModelEventService
[link-travis]: https://travis-ci.org/Alive2212/LaravelModelEventService
[link-scrutinizer]: https://scrutinizer-ci.com/g/Alive2212/LaravelModelEventService/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/Alive2212/LaravelModelEventService
[link-downloads]: https://packagist.org/packages/Alive2212/LaravelModelEventService
[link-author]: https://github.com/https://github.com/Alive2212/
[link-contributors]: ../../contributors
