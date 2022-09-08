<?php

namespace Pyz\Yves\Faq\Plugin\Router;

use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Yves\Router\Route\RouteCollection;

class FaqRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    public const FAQ_INDEX = 'faq-index';

    /**
     * @inheritDoc
     */
    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $routeCollection = $this->addFaqIndexRoute($routeCollection);

        return $routeCollection;
    }

    /**
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    private function addFaqIndexRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/faq/{name}', 'Faq', 'Index', 'indexAction');
        $route = $route->setMethods(['GET']);

        $routeCollection->add(static::FAQ_INDEX, $route);

        return $routeCollection;
    }
}
