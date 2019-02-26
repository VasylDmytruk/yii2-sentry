Yii2 wrap of Sentry PHP SDK
=========================
Yii2 wrap of [Sentry PHP SDK](https://github.com/getsentry/sentry-php)

>Note: This package is not supported properly

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist autoxloo/yii2-sentry "*"
```

or

```
composer require --prefer-dist autoxloo/yii2-sentry "*"
```

or add

```
"autoxloo/yii2-sentry": "*"
```

to the require section of your `composer.json` file.

Config
------

In your application config add:

```php
// ...
'components' => [
        // ...
        'sentry' => [
            'class' => \autoxloo\yii2\sentry\SentryComponent::class,
            'ravenDsn' => 'https://0000000000000000000@sentry.io/000000',          // Your sentry dsn
            'allowCaptureMessage' => true,
        ],
],
```

Usage
-----

Once the extension is installed, simply use it in your code by:

```php
\Yii::$app->sentry->getRavenClient()->captureMessage('some message');
```

or

```php
\Yii::$app->sentry->captureMessage('some message');
```

> Note: In last example captures message only if `allowCaptureMessage` is `true`.

See sentry docs for more details [https://docs.sentry.io/clients/php/](https://docs.sentry.io/clients/php/)
