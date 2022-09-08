<?php

namespace Pyz\Shared\CmsContentWidgetFaqConnector\ContentWidgetConfigurationProvider;

use Spryker\Shared\CmsContentWidget\Dependency\CmsContentWidgetConfigurationProviderInterface;

class CmsContentWidgetFaqConnectorConfigurationProvider implements CmsContentWidgetFaqConnectorConfigurationProviderInterface
{
    public const FUNCTION_NAME = 'faq';

    /**
     * @return string
     */
    public function getFunctionName(): string
    {
        return static::FUNCTION_NAME;
    }

    /**
     * @return array
     */
    public function getAvailableTemplates(): array
    {
        return [
            CmsContentWidgetConfigurationProviderInterface::DEFAULT_TEMPLATE_IDENTIFIER => '@CmsContentWidgetFaqConnector/views/cms-faq/cms-faq.twig',
        ];
    }

    /**
     * @return string
     */
    public function getUsageInformation(): string
    {
        return "{{ faq(['name']) }}. To use a different template {{ faq(['name'], 'default') }}.";
    }

}
