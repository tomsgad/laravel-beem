<h1 align="center">Laravel Beem</h1>
<h2 align="center">Effortless Beem integrations with Laravel</h2>

<p align="center">
    <img src="https://beem.africa/wp-content/uploads/2020/12/Beem-menu-logo-02.svg" height="200">
</p>

<p align="center">
    <a href="https://packagist.org/packages/tomsgad/laravel-beem"><img src="https://img.shields.io/packagist/v/tomsgad/laravel-beem.svg?style=flat-square" alt="Latest Version on Packagist"></a>
    <a href="https://github.com/tomsgad/laravel-beem/actions?query=workflow%3Arun-tests+branch%3Amain"><img src="https://img.shields.io/github/workflow/status/tomsgad/laravel-beem/run-tests?label=tests" alt="Github Test Action Status"></a>
    <a href="https://github.com/tomsgad/laravel-beem/actions?query=workflow%3A%22Check+%26+fix+styling%22+branch%3Amain"><img src="https://img.shields.io/github/workflow/status/tomsgad/laravel-beem/Check%20&%20fix%20styling?label=code%20style" alt="Github Code Style Action Status"></a>
    <a href="https://packagist.org/packages/tomsgad/laravel-beem"><img src="https://img.shields.io/packagist/dt/tomsgad/laravel-beem.svg?style=flat-square" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/tomsgad/laravel-beem"><img src="https://img.shields.io/packagist/l/tomsgad/laravel-beem" alt="License"></a>
</p>

This package provides a simple and crisp way to access the Beem API endpoints, query data with Laravel.

## Installation

You can install the package via composer:

```bash
composer require tomsgad/laravel-beem
```

After the package is installed, you can optionally publish the config file.

```bash
php artisan vendor:publish --tag="beem-config"
```

This is the contents of the published config file:

```php
return [
    'sms' => [
        /*
        |--------------------------------------------------------------------------
        | Beem SMS API Key
        |--------------------------------------------------------------------------
        |
        | Here we set sms api key that will be used to send the sms. Get your
        | credentials from https://sms.beem.africa/#!/dashboard/profile/authentication
        |
        */
        'api_key' => env('BEEM_SMS_API_KEY', ''),

        /*
        |--------------------------------------------------------------------------
        | Beem SMS Secret Key
        |--------------------------------------------------------------------------
        |
        | Here we set sms secret key that will be used to send the sms. Get your
        | credentials from https://sms.beem.africa/#!/dashboard/profile/authentication
        |
        */
        'secret_key' => env('BEEM_SMS_SECRET_KEY', ''),

        /*
        |--------------------------------------------------------------------------
        | Beem SMS Sender Name
        |--------------------------------------------------------------------------
        |
        | Here we set a sender name that will be used to send the sms. Default
        | sender name is `INFO`. Please only use sender names that have been registered
        | or the sms will not be sent.
        |
        */

        'sender_name' => env('BEEM_SMS_SENDER_NAME', ''),
    ]
];
```

## Setting up Beem service
You will need to get your api details from your profile. Here are the steps you can follow (Described by [Beem](https://docs.beem.africa/)):

1. Create a free account on https://login.beem.africa.
2. On completing your registration you will get a confirmation email. Click on the link or paste the link into your browser to validate the account.
3. Log into your account with your username & password on https://login.beem.africa.
4. You should have received some free test credits and a default sender ID of ‘INFO’ should be Active.
5. Visit the 'Profile ' tab and click on ‘Authentication Information’.
6. Click generate API Key and Secret to obtain these. Note that the Secret is only displayed once, so please store this safely.
7. Use this API Key and Secret to start sending messages using the API defined below.

Set up your `.env` file with the credentials you go from the procedure above

```php
BEEM_SMS_API_KEY=""
BEEM_SMS_SECRET_KEY=""
BEEM_SMS_SENDER_NAME=""
```

Add `routeNotificationForBeem` to your notifiable model and define how to get phone number. **Note**: The method should return an array or a countable. I have let it that way so you can implement it the way you see fit.

```php
<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use  Notifiable;

    public function routeNotificationForBeem()
    {
        return array($this->phone);
    }
}

```

## Usage
Now you can use the channel in your `(via)` method inside the notification. This example will work with settings from `.env` file.

```php
use Illuminate\Notifications\Notification;
use Tomsgad\Beem\SMS\BeemMessage;

class Demo extends Notification
{
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['beem'];
    }

    public function toBeem($notifiable)
    {
        return (new BeemMessage())
            ->content('Message Goes Here');
    }
}
```

You can also send a notification on the fly without setting the `.env` variables. This is useful if you set the details dynamically or you have a multi-tenant application.

```php
use Illuminate\Notifications\Notification;
use Tomsgad\Beem\SMS\BeemMessage;

class Demo extends Notification
{
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['beem'];
    }

    public function toBeem($notifiable)
    {
        return (new BeemMessage())
            ->content('Message Goes Here')
            ->sender('senderNameGoesHere')
            ->secretKey('secretKeyGoesHere')
            ->apiKey('apiKeyGoesHere');
    }
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

If you discover any security-related issues, please email thomson@magurugroup.co.tz instead of using the issue tracker.

## Credits

- [Thomson Maguru](https://github.com/tomsgad)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
