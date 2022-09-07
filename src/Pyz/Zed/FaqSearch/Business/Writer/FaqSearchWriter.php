<?php

namespace Pyz\Zed\FaqSearch\Business\Writer;

use Generated\Shared\Transfer\FaqTransfer;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Orm\Zed\FaqSearch\Persistence\PyzFaqSearchQuery;

class FaqSearchWriter
{
    /**
     * @param int $idFaq
     *
     * @return void
     */
    public function publish(int $idFaq): void
    {
        $faqEntity = PyzFaqQuery::create()
            ->filterByIdFaq($idFaq)
            ->findOne();

        $faqTransfer = new FaqTransfer();

        $faqTransfer->fromArray($faqEntity->toArray());

        $searchEntity = PyzFaqSearchQuery::create()
            ->filterByFkFaq($idFaq)
            ->findOneOrCreate();

        $searchEntity->setFkFaq($idFaq);

        $searchEntity->setData($faqTransfer->toArray());

        $searchEntity->save();
    }
}

