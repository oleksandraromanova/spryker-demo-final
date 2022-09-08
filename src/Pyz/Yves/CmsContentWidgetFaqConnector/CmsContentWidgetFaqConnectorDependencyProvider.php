<?php

namespace Pyz\Yves\CmsContentWidgetFaqConnector;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class CmsContentWidgetFaqConnectorDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_FAQ = 'CLIENT_FAQ';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);
        $container = $this->addCmsBlockStorageClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addCmsBlockStorageClient(Container $container): Container
    {
        $container[static::CLIENT_FAQ] = function (Container $container) {
            return $container->getLocator()->faq()->client();
        };

        return $container;
    }
}


