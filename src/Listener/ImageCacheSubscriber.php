<?php

namespace App\Listener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;
use App\Entity\Picture;

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

    /**
     * L evenement preRemove est appele sur chaque entite lorsqu'elle est transmis a la methode EntityManager->remove ().
     *
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     * @return void
     */
    public function preRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if (!$entity instanceof Picture) {
            return;
        }
        $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'imageFile'));
    }

    /**
     * L evenement preUpdate est appele juste avant qu une instruction de mise a jour ne soit appelee pour une entite dans la methode EntityManager->flus()
     *
     * @param \Doctrine\ORM\Event\PreUpdateEventArgs $eventArgs
     * @return void
     */
    public function preUpdate(PreUpdateEventArgs $eventArgs)
    {
        $entity = $eventArgs->getEntity();
        if (!$entity instanceof Picture) {
            return;
        }
        if ($entity->getPictureFile() instanceof UploadedFile) {
            $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'imageFile'));
        }
    }
}
