<?php

namespace Pyz\Yves\Faq\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;

/**
 * @method \Pyz\Client\Planet\PlanetClientInterface getClient()
 */
class IndexController extends AbstractController
{
    /**
     * @param string $name
     *
     * @return \Spryker\Yves\Kernel\View\View
     */
    public function indexAction(string $name)
    {
        $faq = $this->getClient()->getFaqByName($name);

        return $this->view(
            [
                'faq' => $faq,
            ],
            [],
            '@Faq/views/index/index.twig'
        );
    }
}
