<?php

namespace JungeHaie\GoogleCloudStorage;

use Illuminate\Filesystem\FilesystemManager;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use Aws\S3\S3Client;

/**
 * Class StorageServiceProvider
 * @package JungeHaie\Filesystem
 */
class GoogleCloudStorageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @throws \InvalidArgumentException
     * @return void
     */
    public function boot()
    {
        /** @var FilesystemManager $storage */
        $storage = $this->app->make('filesystem');

        $storage->extend('gcs', function ($app, $config) {
            $client = new S3Client([
                'credentials' => [
                    'key'    => $config['key'],
                    'secret' => $config['secret'],
                ],
                'endpoint'    => $config['base_url'] ?? 'https://storage.googleapis.com',
                'region'      => $config['region'],
                'version'     => $config['version'] ?? 'latest',
            ]);

            // Fixes an invalid argument error: "Invalid query parameter(s): [encoding-type]"
            /** @see S3Client::getEncodingTypeMiddleware() */
            $client->getHandlerList()->remove('s3.auto_encode');

            $adapter = new AwsS3Adapter($client, $config['bucket']);

            return new Filesystem($adapter);
        });
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
