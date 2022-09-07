<?php

namespace Pyz\Yves\CmsContentWidgetFaqConnector;

use Pyz\Client\Faq\FaqClientInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class CmsContentWidgetFaqConnectorFactory extends AbstractFactory
{
    /**
     * @return \Pyz\Client\Faq\FaqClientInterface
     */
    public function getFaqClient(): FaqClientInterface
    {
        return $this->getProvidedDependency(CmsContentWidgetFaqConnectorDependencyProvider::CLIENT_FAQ);
    }
}

