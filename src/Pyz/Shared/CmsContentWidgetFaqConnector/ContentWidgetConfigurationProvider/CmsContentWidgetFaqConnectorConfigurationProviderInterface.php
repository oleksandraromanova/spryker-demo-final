<?php

namespace Pyz\Shared\CmsContentWidgetFaqConnector\ContentWidgetConfigurationProvider;

use Spryker\Shared\CmsContentWidget\Dependency\CmsContentWidgetConfigurationProviderInterface;

interface CmsContentWidgetFaqConnectorConfigurationProviderInterface extends CmsContentWidgetConfigurationProviderInterface
{
    /**
     * @return string
     */
    public function getFunctionName(): string;

    /**
     * @return array
     */
    public function getAvailableTemplates(): array;

    /**
     * @return string
     */
    public function getUsageInformation(): string;

}
