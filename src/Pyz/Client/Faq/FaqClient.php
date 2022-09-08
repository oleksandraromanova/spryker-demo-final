<?php

namespace Pyz\Client\Faq;

use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\Faq\FaqFactory getFactory()
 */
class FaqClient extends AbstractClient implements FaqClientInterface
{
    /**
     * @param string $name
     *
     * @return array
     */
    public function getFaqByName(string $name): array
    {
        $searchQuery = $this->getFactory()
            ->createFaqQueryPlugin($name);

        $resultFormatters = $this->getFactory()
            ->getSearchQueryFormatters();

        $searchResults = $this->getFactory()
            ->getSearchClient()
            ->search(
                $searchQuery,
                $resultFormatters
            );

        return $searchResults['faq'] ?? [];
    }

}
