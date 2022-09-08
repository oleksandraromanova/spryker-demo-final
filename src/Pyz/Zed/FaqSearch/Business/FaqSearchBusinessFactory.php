<?php

namespace Pyz\Zed\FaqSearch\Business;

use Pyz\Zed\FaqSearch\Business\Writer\FaqSearchWriter;

class FaqSearchBusinessFactory
{
    /**
     * @return \Pyz\Zed\FaqSearch\Business\Writer\FaqSearchWriter
     */
    public function createFaqSearchWriter()
    {
        return new FaqSearchWriter();
    }
}

