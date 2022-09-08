<?php

namespace Pyz\Zed\DataImport\Business\Model\Faq;

use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\PublishAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Pyz\Zed\Faq\Dependency\FaqEvents;

class FaqWriterStep extends PublishAwareStep implements DataImportStepInterface
{
    public const KEY_NAME = 'name';
    public const KEY_ANSWER = 'answer';
    public const KEY_ACTIVE = 'active';
    public const KEY_VOTES = 'votes';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     * @throws \Spryker\Zed\DataImport\Business\Exception\EntityNotFoundException
     *
     */
    public function execute(DataSetInterface $dataSet)
    {
        $faqEntity = PyzFaqQuery::create()
            ->filterByName($dataSet[static::KEY_NAME])
            ->findOneOrCreate();

        $faqEntity->setAnswer($dataSet[static::KEY_ANSWER]);
        $faqEntity->setActive($dataSet[static::KEY_ACTIVE]);
        $faqEntity->setVotes($dataSet[static::KEY_VOTES]);

        if ($faqEntity->isNew() || $faqEntity->isModified()) {
            $faqEntity->save();
        }

        $this->addPublishEvents(FaqEvents::ENTITY_PYZ_FAQ_CREATE, $faqEntity->getIdFaq());
    }
}

