<?php

namespace Pyz\Zed\Faq\Persistence;

use Generated\Shared\Transfer\FaqTransfer;
use Orm\Zed\Faq\Persistence\PyzFaq;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

class FaqRepository extends AbstractRepository implements FaqRepositoryInterface
{
    /**
     * @param int $idFaq
     *
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function findFaqById(int $idFaq): ?FaqTransfer
    {
        $faqEntity = $this->createPyzFaqQuery()
            ->findOneByIdFaq($idFaq);
        if (!$faqEntity) {
            return null;
        }
        return $this->mapEntityToTransfer($faqEntity);
    }

    /**
     * @return \Orm\Zed\Faq\Persistence\PyzFaqQuery
     */
    private function createPyzFaqQuery(): PyzFaqQuery
    {
        return PyzFaqQuery::create();
    }

    /**
     * @param \Orm\Zed\Faq\Persistence\PyzFaq $faqEntity
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    private function mapEntityToTransfer(PyzFaq $faqEntity): FaqTransfer
    {
        return (new FaqTransfer())->fromArray($faqEntity->toArray());
    }
}
