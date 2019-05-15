<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="picture")
 * @ORM\Entity(repositoryClass="App\Repository\PictureRepository")
 * 
 * @Vich\Uploadable
 */
class Picture
{
    /*-----------------------------------------------------------------------------------
     *                                           Properties 
    ----------------------------------------------------------------------------------- */

    #region

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="idPicture", type="integer")
     */
    private $idPicture;

    /**
     * @var string|null
     * 
     * @ORM\Column(type="string", length=255, nullable=true)  
     */
    private $filename;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @var File|null
     * @Assert\Image(mimeTypes="image/jpeg")
     * 
     * @Vich\UploadableField(mapping="event_image", fileNameProperty="filename") 
     */
    private $imageFile;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Event", inversedBy="pictures")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="idEvent", nullable=false)
     */
    private $event;

    public function getIdPicture(): ?int
    {
        return $this->idPicture;
    }

    #endregion

    /*-----------------------------------------------------------------------------------
     *                                         Getters - Setters 
    ----------------------------------------------------------------------------------- */

    #region

    /**
     * Get the value of filename
     *
     * @return  string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * Set the value of filename
     *
     * @param  string|null  $filename
     *
     * @return  self
     */
    public function setFilename(?string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @return  File|null
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @param  File|null  $imageFile  NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @return self
     */
    public function setImageFile(?File $imageFile = null): self
    {
        $this->imageFile = $imageFile;
        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }

    #endregion

}
