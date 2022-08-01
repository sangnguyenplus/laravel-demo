<?php

namespace Org\Core\Providers;

use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Routing\Middleware\ValidateSignature;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Org\Core\Commands\DemoCommand;
use Org\Core\Core;
use Org\Core\Exceptions\CustomHandlerException;
use Org\Core\Facades\CoreFacadeLoadedDirectlyFacade;
use Org\Core\Http\Middleware\CustomVerifyCsrfTokenMiddleware;
use Org\Core\Http\Middleware\DemoMiddleware;

class CoreServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ExceptionHandler::class, CustomHandlerException::class);
    }

    public function boot()
    {
        // NOTE: Load routes, you can load many route files as you wish.
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        // NOTE: Load views, the same as load routes
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'org/core');

        // NOTE: Load configs
        $this->mergeConfigFrom(__DIR__ . '/../../config/core.php', 'core');

        $this->app->bind('core', function () {
            return new Core();
        });

        // NOTE: This facade can be loaded directly via PHP code, not using composer
        AliasLoader::getInstance()->alias('CoreFacadeLoadedDirectly', CoreFacadeLoadedDirectlyFacade::class);

        Event::listen(RouteMatched::class, function () {
            /**
             * @var Router $router
             */
            $router = $this->app['router'];

            // NOTE: Option 1: this middleware will be added into group web so every requests from web will trigger this middleware
            $router->pushMiddlewareToGroup('web', DemoMiddleware::class);

            // NOTE: Option 2: named for middleware, then we can use it in routes.
            $router->aliasMiddleware('demoMiddleware', DemoMiddleware::class);

            // NOTE: Option 3: define a group, easy to use multiple middleware in routes, the same as "web".
            $router->middlewareGroup('demo', [DemoMiddleware::class, ValidateSignature::class]);

            // NOTE: Override existing middleware in app/Http/Middleware
            $this->app->instance(VerifyCsrfToken::class, new CustomVerifyCsrfTokenMiddleware());
        });

        // NOTE: Register a new command
        $this->commands([
            DemoCommand::class,
        ]);

        // NOTE: Used to register events & its listeners
        $this->app->register(EventServiceProvider::class);
    }

    public function provides()
    {
        return ['core'];
    }
}
