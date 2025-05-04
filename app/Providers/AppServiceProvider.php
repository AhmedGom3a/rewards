<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Psr\Http\Client\ClientInterface;
use Http\Adapter\Guzzle7\Client as GuzzleAdapter;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ClientInterface::class, function () {
            return new GuzzleAdapter();
        });

        $this->app->singleton(Client::class, function () {
            return ClientBuilder::create()
                ->setHttpClient(new GuzzleAdapter())
                ->setHosts([
                    env('ELASTICSEARCH_HOST'),
                ])
                ->build();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
