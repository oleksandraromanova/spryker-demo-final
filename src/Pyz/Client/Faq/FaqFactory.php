<?php

namespace Pyz\Client\Faq;

use Pyz\Client\Faq\Plugin\Elasticsearch\Query\FaqQueryPlugin;
use Spryker\Client\Kernel\AbstractFactory;

class FaqFactory extends AbstractFactory
{
    /**
     * @param string $name
     *
     * @return \Pyz\Client\Faq\Plugin\Elasticsearch\Query\FaqQueryPlugin
     */
    public function createFaqQueryPlugin(string $name)
    {
        return new FaqQueryPlugin($name);
    }

    /**
     * @return array
     */
    public function getSearchQueryFormatters()
    {
        return $this->getProvidedDependency(FaqDependencyProvider::FAQ_RESULT_FORMATTER_PLUGINS);
    }

    /**
     * @return \Spryker\Client\Search\SearchClientInterface
     */
    public function getSearchClient()
    {
        return $this->getProvidedDependency(FaqDependencyProvider::CLIENT_SEARCH);
    }

}
