<?php

namespace Pyz\Zed\FaqSearch\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\FaqSearch\Business\FaqSearchBusinessFactory getFactory()
 */
class FaqSearchFacade extends AbstractFacade implements FaqSearchFacadeInterface
{
    /**
     * @param int $idFaq
     *
     * @return void
     */
    public function publish(int $idFaq): void
    {
        $this->getFactory()
            ->createFaqSearchWriter()
            ->publish($idFaq);
    }
}
