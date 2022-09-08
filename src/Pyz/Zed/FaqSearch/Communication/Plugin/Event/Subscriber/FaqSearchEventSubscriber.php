<?php

namespace Pyz\Zed\FaqSearch\Communication\Plugin\Event\Subscriber;

use Pyz\Zed\Faq\Dependency\FaqEvents;
use Pyz\Zed\FaqSearch\Communication\Plugin\Event\Listener\FaqSearchListener;
use Spryker\Zed\Event\Dependency\EventCollectionInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventSubscriberInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \Pyz\Zed\FaqSearch\Business\FaqSearchFacadeInterface getFacade()
 */
class FaqSearchEventSubscriber extends AbstractPlugin implements EventSubscriberInterface
{
    /**
     * @param \Spryker\Zed\Event\Dependency\EventCollectionInterface $eventCollection
     *
     * @return \Spryker\Zed\Event\Dependency\EventCollectionInterface
     */
    public function getSubscribedEvents(EventCollectionInterface $eventCollection)
    {
        $eventCollection->addListenerQueued(FaqEvents::ENTITY_PYZ_FAQ_CREATE, new FaqSearchListener());

        $eventCollection->addListenerQueued(FaqEvents::ENTITY_PYZ_FAQ_UPDATE, new FaqSearchListener());

        $eventCollection->addListenerQueued(FaqEvents::ENTITY_PYZ_FAQ_DELETE, new FaqSearchListener());

        return $eventCollection;
    }
}
