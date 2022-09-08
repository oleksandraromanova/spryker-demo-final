<?php

namespace Pyz\Client\Faq\Plugin\Elasticsearch\ResultFormatter;

use Elastica\ResultSet;
use Spryker\Client\SearchElasticsearch\Plugin\ResultFormatter\AbstractElasticsearchResultFormatterPlugin;

class FaqResultFormatterPlugin extends AbstractElasticsearchResultFormatterPlugin
{
    public const NAME = 'faq';

    /**
     * @return string
     */
    public function getName()
    {
        return static::NAME;
    }

    /**
     * @param \Elastica\ResultSet $searchResult
     * @param array $requestParameters
     *
     * @return array
     */
    protected function formatSearchResult(ResultSet $searchResult, array $requestParameters)
    {
        foreach ($searchResult->getResults() as $document) {
            return $document->getSource();
        }
        return [];
    }
}
