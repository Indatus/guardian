<?php namespace Indatus\Guardian;

/**
 * This file is part of Guardian
 *
 * (c) Ben Kuhl <bkuhl@indatus.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use Indatus\Guardian\Commands\DatabaseSeedCommand;
use Indatus\Guardian\Commands\Migrations\RefreshCommand;
use Indatus\Guardian\Commands\Migrations\ResetCommand;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('indatus/guardian');
    }

    /**
     * Register the service provider.
     *
     * @codeCoverageIgnore
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('command.seed', function ($app) {
                return new DatabaseSeedCommand($app['db']);
            });

        $this->app->bindShared('command.migrate.reset', function ($app) {
                return new ResetCommand($app['migrator']);
            });

        $this->app->bindShared('command.migrate.refresh', function () {
                return new RefreshCommand();
            });
    }

    /**
     * @inheritDoc
     */
    public function provides()
    {
        return [
            'command.seed',
            'command.migrate.refresh',
            'command.migrate.reset',
        ];
    }
}
