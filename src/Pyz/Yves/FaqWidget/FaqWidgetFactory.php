<?php

namespace Pyz\Yves\FaqWidget;

use Pyz\Client\Faq\FaqClientInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class FaqWidgetFactory extends AbstractFactory
{
    /**
     * @return \Pyz\Client\Faq\FaqClientInterface
     */
    public function getFaqClient(): FaqClientInterface
    {
        return $this->getProvidedDependency(FaqWidgetDependencyProvider::CLIENT_FAQ);
    }
}
