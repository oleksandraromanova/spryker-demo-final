<?php

namespace Pyz\Yves\FaqWidget\Widget;

use Spryker\Yves\Kernel\Widget\AbstractWidget;

/**
 * @method \Pyz\Yves\FaqWidget\FaqWidgetFactory getFactory()
 */
class FaqWidget extends AbstractWidget
{
    /**
     * @param string $faqName
     */
    public function __construct(string $faqName)
    {
        $this->addParameter('faq', $this->findFaq($faqName));
    }

    /**
     * @return string
     */
    public static function getName(): string
    {
        return 'FaqWidget';
    }

    /**
     * @return string
     */
    public static function getTemplate(): string
    {
        return '@FaqWidget/views/faq/faq.twig';
    }

    /**
     * @param string $faqName
     *
     * @return array
     */
    protected function findFaq(string $faqName): array
    {
        return $this->getFactory()
            ->getFaqClient()
            ->getFaqByName($faqName);
    }
}

