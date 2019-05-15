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
    private $imageName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @var File|null
     * @Assert\Image(mimeTypes="image/jpeg")
     * 
     * @Vich\UploadableField(mapping="event_image", fileNameProperty="imageName") 
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

    /**
     * Get the value of imageName
     *
     * @return  string|null
     */
    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    /**
     * Set the value of imageName
     *
     * @param  string|null  $imageName
     *
     * @return  self
     */
    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

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
}
