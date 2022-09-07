<?php

namespace Pyz\Client\Faq;

use Pyz\Client\Faq\Plugin\Elasticsearch\ResultFormatter\FaqResultFormatterPlugin;
use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

class FaqDependencyProvider extends AbstractDependencyProvider
{
    public const CLIENT_SEARCH = 'CLIENT_SEARCH';
    public const FAQ_RESULT_FORMATTER_PLUGINS = 'FAQ_RESULT_FORMATTER_PLUGINS';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $container = $this->addSearchClient($container);
        $container = $this->addCatalogSearchResultFormatterPlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addSearchClient(Container $container)
    {
        $container[static::CLIENT_SEARCH] = function (Container $container) {

            return $container->getLocator()->search()->client();

        };

        return $container;

    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function addCatalogSearchResultFormatterPlugins(Container $container)
    {
        $container[static::FAQ_RESULT_FORMATTER_PLUGINS] = function () {

            return [
                new FaqResultFormatterPlugin(),
            ];
        };

        return $container;

    }

}
