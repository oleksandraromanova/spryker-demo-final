<?php

namespace Pyz\Zed\FaqSearch\Business;

interface FaqSearchFacadeInterface
{
    /**
     * @param int $idFaq
     *
     * @return void
     */
    public function publish(int $idFaq): void;

}
