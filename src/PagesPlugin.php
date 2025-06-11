<?php
declare(strict_types=1);

namespace Pages;

use App\Core\CmsPlugin;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Override;

/**
 * Plugin for Pages
 */
class PagesPlugin extends CmsPlugin
{
    protected ?string $name = 'Pages';
    protected bool $consoleEnabled = false;
    protected bool $middlewareEnabled = false;
    protected bool $servicesEnabled = false;

    /**
     * @inheritDoc
     */
    #[Override]
    public function routes(RouteBuilder $routes): void
    {
        parent::routes($routes);

        $routes->prefix('Admin', function (RouteBuilder $builder): void {
            $builder->plugin($this->name ?? 'Pages', function (RouteBuilder $builder): void {
                $builder->applyMiddleware('auth');
                $builder->connect('/', ['controller' => 'Dashboard']);
                $builder->fallbacks(DashedRoute::class);
            });
        });
    }
}
