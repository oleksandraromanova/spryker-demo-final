<?php

namespace Pyz\Zed\Faq\Business;

use Pyz\Zed\Faq\Business\Faq\FaqSaver;
use Pyz\Zed\Faq\Business\Faq\FaqSaverInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface getEntityManager()
 */
class FaqBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\Faq\Business\Faq\FaqSaverInterface
     */
    public function createFaqSaver(): FaqSaverInterface
    {
        return new FaqSaver(
            $this->getEntityManager()
        );
    }
}
