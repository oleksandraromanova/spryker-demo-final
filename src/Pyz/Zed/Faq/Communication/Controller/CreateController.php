<?php

namespace Pyz\Zed\Faq\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Faq\Communication\FaqCommunicationFactory getFactory()
 */
class CreateController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $faqForm = $this->getFactory()
            ->createFaqForm()
            ->handleRequest($request);

        if ($faqForm->isSubmitted() && $faqForm->isValid()) {
            $this->addSuccessMessage('FAQ was created. Well not yet :)');

            return $this->redirectResponse('/faq/list');
        }

        return $this->viewResponse([
            'faqForm' => $faqForm->createView()
        ]);
    }
}
