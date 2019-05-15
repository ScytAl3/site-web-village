<?php

namespace App\Listener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

/**
 * Classe pour écouter sur plusieurs evenements
 */
class ImageCacheSubscriber implements EventSubscriber
{

    /**
     * @var cacheManager
     */
    private $cacheManager;

    /**
     * @var uploaderHelper
     */
    private $uploaderHelper;

    /**
     * Constructeur
     */
    public function __construct(CacheManager $cacheManager, UploaderHelper $uploaderHelper)
    {
        $this->cacheManager = $cacheManager;
        $this->uploaderHelper = $uploaderHelper;
    }

    /**
     * Retourne les evenements quand une entite est supprimee ou modifiee
     *
     * @return void
     */
    public function getSubscribedEvents()
    {
        return [
            'preRemove',
            'preUpdate'
        ];
    }

    public function preRemove(PreFlushEventArgs $args)
    { }

    public function preUpdate(PreUpdateEventArgs $eventArgs)
    {
        dump($eventArgs->getEntity());
        dump($eventArgs->getObject());
    }
}
