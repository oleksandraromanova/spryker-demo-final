<?php

namespace Pyz\Yves\FaqWidget;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class FaqWidgetDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_FAQ = 'CLIENT_FAQ';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = $this->addFaqClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addFaqClient(Container $container)
    {
        $container[self::CLIENT_FAQ] = function (Container $container) {

            return $container->getLocator()->faq()->client();
        };

        return $container;
    }
}

