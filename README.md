# laravel-filesystem-google-cloud-storage

A Laravel Flysystem implementation for the Google Cloud Storage via a S3Client.

## Getting started

### Installation

You can install this package via composer using this command:

`composer require jungehaie/filesystem-google-cloud-storage`

### Laravel 5.3+

1. Register the Service Provider

```php
// config/app.php
'providers' => [
    ...
    JungeHaie\GoogleCloudStorage\GoogleCloudStorageServiceProvider::class,
]
```

### Lumen 5.3+

1. Register the Service Provider

```php
// bootstrap/app.php
$app->register(JungeHaie\GoogleCloudStorage\GoogleCloudStorageServiceProvider::class);
```

2. Add a configuration file at `config/filesystems.php`

You can copy the content of Laravels [filesystems.php](https://github.com/laravel/laravel/blob/master/config/filesystems.php)

3. Register the configuration to be loaded

```php
// bootstrap/app.php
$app->configure('filesystems');
```

Now you're all set!

### Configuration

Your basic `config/filesystems.php` disk entry could look like this:

```php
'google' => [
    'driver' => 'gcs',
    'key'    => env('GCS_KEY'),
    'secret' => env('GCS_SECRET'),
    'region' => env('GCS_REGION'),
    'bucket' => env('GCS_BUCKET'),
```

This will often be enough to get you started.  
However you can also set following options:
* base_url
* version

1. Where do I get a GCS key and secret?  
[Look no furhter!](https://cloud.google.com/storage/docs/migrating#keys)


2. How do I set a GCS region?  
[I got you covered.](https://cloud.google.com/storage/docs/bucket-locations)

## Contributing

### Pull Requests

- **[PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)**

- **Add tests** - Your patch won't be accepted if it doesn't have tests.

- **Document any changes** - Make sure the `README.md` and any other relevant documentation are kept up-to-date.

- **Create feature branches** - Use `git checkout -b my-new-feature`

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

- **Send coherent history** - Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please [squash them](http://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#Changing-Multiple-Commit-Messages) before submitting.


## Licence

This library is distributed under the terms of the [MIT license](https://github.com/jungehaie/laravel-filesystem-google-cloud-storage/blob/master/LICENSE.md)