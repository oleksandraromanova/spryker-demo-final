<?php

namespace Pyz\Zed\Faq\Communication\Controller;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Faq\Communication\FaqCommunicationFactory getFactory()
 */
class EditController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
// $idPlanet = $this->castId($request->query->get('id-planet'));
        $faqTransfer = (new FaqTransfer()) // TODO add business logic to retrieve Planet by id
        ->setName('Delivery')
            ->setAnswer('The terms of delivery.');

        $faqForm = $this->getFactory()
            ->createFaqForm($faqTransfer)
            ->handleRequest($request);

        if ($faqForm->isSubmitted() && $faqForm->isValid()) {
            $this->addSuccessMessage('FAQ was updated. Well not yet :)');
            return $this->redirectResponse('/faq/list');
        }

        return $this->viewResponse([
            'faqForm' => $faqForm->createView()
        ]);
    }
}
