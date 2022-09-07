<?php

namespace Pyz\Zed\Faq\Communication\Table;

use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Orm\Zed\Faq\Persistence\Map\PyzFaqTableMap;

class FaqTable extends AbstractTable
{
    /** @var \Orm\Zed\Faq\Persistence\PyzFaqQuery */
    private PyzFaqQuery $faqQuery;

    /**
     * @param \Orm\Zed\Faq\Persistence\PyzFaqQuery $faqQuery
     */
    public function __construct(PyzFaqQuery $faqQuery)
    {
        $this->faqQuery = $faqQuery;
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return \Spryker\Zed\Gui\Communication\Table\TableConfiguration
     */
    protected function configure(TableConfiguration $config): TableConfiguration
    {
        $config->setHeader([
            PyzFaqTableMap::COL_NAME => 'FAQ',
            PyzFaqTableMap::COL_ANSWER => 'Answer',
            PyzFaqTableMap::COL_VOTES => 'Votes'
        ]);

        $config->setSortable([
            PyzFaqTableMap::COL_NAME => 'FAQ',
            PyzFaqTableMap::COL_ANSWER => 'Answer',
            PyzFaqTableMap::COL_VOTES => 'Votes'
        ]);

        $config->setSearchable([
            PyzFaqTableMap::COL_NAME
        ]);

        return $config;
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration
     * $config
     *
     * @return array
     */
    protected function prepareData(TableConfiguration $config): array
    {
        $faqDataItems = $this->runQuery($this->faqQuery,
            $config);
        $faqTableRows = [];
        foreach ($faqDataItems as $faqDataItem) {
            $faqTableRows[] = [
                PyzFaqTableMap::COL_NAME =>
                    $faqDataItem[PyzFaqTableMap::COL_NAME],
                PyzFaqTableMap::COL_ANSWER =>
                    $faqDataItem[PyzFaqTableMap:: COL_ANSWER],
                PyzFaqTableMap::COL_VOTES =>
                    $faqDataItem[PyzFaqTableMap:: COL_VOTES]
            ];
        }
        return $faqTableRows;
    }
}
