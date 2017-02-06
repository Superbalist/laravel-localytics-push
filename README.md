# laravel-localytics-push

A Laravel library for sending push notifications via the [Localytics Push Notification](https://www.localytics.com/features/push-messaging/) service

[![Author](http://img.shields.io/badge/author-@superbalist-blue.svg?style=flat-square)](https://twitter.com/superbalist)
[![Build Status](https://img.shields.io/travis/Superbalist/laravel-localytics-push/master.svg?style=flat-square)](https://travis-ci.org/Superbalist/laravel-localytics-push)
[![StyleCI](https://styleci.io/repos/71336060/shield?branch=master)](https://styleci.io/repos/71336060)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Packagist Version](https://img.shields.io/packagist/v/superbalist/laravel-localytics-push.svg?style=flat-square)](https://packagist.org/packages/superbalist/laravel-localytics-push)
[![Total Downloads](https://img.shields.io/packagist/dt/superbalist/laravel-localytics-push.svg?style=flat-square)](https://packagist.org/packages/superbalist/laravel-localytics-push)

This package is a wrapper bridging [php-localytics-push](https://github.com/Superbalist/php-localytics-push) into Laravel.

## Installation

```bash
composer require superbalist/laravel-localytics-push
```

The package has a default configuration which uses the following environment variables.
```
LOCALYTICS_APP_ID=null
LOCALYTICS_API_KEY=null
LOCALYTICS_API_SECRET=null
```

To customize the configuration file, publish the package configuration using Artisan.
```bash
php artisan vendor:publish --provider="Superbalist\LaravelLocalyticsPush\LocalyticsServiceProvider"
```

You can then edit the generated config at `app/config/localytics.php`.

Register the service provider in app.php
```php
'providers' => [
    // ...
    Superbalist\LaravelLocalyticsPush\LocalyticsServiceProvider::class,
]
```

Register the facade in app.php
```php
'aliases' => [
    // ...
    'Localytics' => Superbalist\LaravelLocalyticsPush\LocalyticsFacade::class,
]
```

## Usage

```php
$message = [
    'target' => [
        'profile' => [
            'criteria' => [
                [
                    'key' => '$email',
                    'scope' => 'Organization',
                    'type' => 'string',
                    'op' => 'in',
                    'values' => [
                        'matthew@superbalist.com',
                    ]
                ]
            ],
            'op' => 'and',
        ],
    ],
    'alert' => [
        'title' => 'Message Title',
        'body' => 'This is my message content!',
    ]
];
Localytics::pushMessage('profile', $message);
```
