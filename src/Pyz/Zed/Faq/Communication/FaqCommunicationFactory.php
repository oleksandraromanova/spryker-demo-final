<?php

namespace Pyz\Zed\Faq\Communication;

use Generated\Shared\Transfer\FaqTransfer;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Pyz\Zed\Faq\Communication\Form\FaqForm;
use Pyz\Zed\Faq\FaqDependencyProvider;
use Pyz\Zed\Faq\Communication\Table\FaqTable;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Symfony\Component\Form\FormInterface;

class FaqCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \Pyz\Zed\Faq\Communication\Table\FaqTable
     */
    public function createFaqTable(): FaqTable
    {
        return new FaqTable($this->getFaqPropelQuery());
    }

    /**
     * @return \Orm\Zed\Faq\Persistence\PyzFaqQuery
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    private function getFaqPropelQuery(): PyzFaqQuery
    {
        return $this->getProvidedDependency(FaqDependencyProvider::QUERY_FAQ);
    }

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer|null $faqTransfer
     * @param array $options
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createFaqForm(?FaqTransfer $faqTransfer = null, array $options = []): FormInterface
    {
        return $this->getFormFactory()->create(
            FaqForm::class,
            $faqTransfer,
            $options
        );
    }

}
