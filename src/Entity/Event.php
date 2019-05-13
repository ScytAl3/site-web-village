<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Event
 * 
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 * @ORM\HasLifecycleCallbacks()
 * 
 * @Vich\Uploadable
 */
class Event
{

    /*-----------------------------------------------------------------------------------
     *                                           Properties 
    ----------------------------------------------------------------------------------- */
    #region

    /**
     * @var int
     * 
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="idEvent", type="integer")
     */
    private $idEvent;

    /**
     * @var string|null
     * 
     * @ORM\Column(type="string", length=255,)  
     */
    private $imageName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @var File|null
     * 
     * @Vich\UploadableField(mapping="event_image", fileNameProperty="imageName") 
     */
    private $imageFile;

    /**
     * @var string
     * 
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="start_date_event", type="datetime")
     */
    private $startDateEvent;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="end_date_event", type="datetime")
     */
    private $endDateEvent;

    /**
     *  @var string
     * 
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     *  @var string
     * 
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     *  @var \DateTime
     * 
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @var \DateTime|null
     * 
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updated_at;

    #endregion

    /*-----------------------------------------------------------------------------------
     *                                         Constructeur
    ----------------------------------------------------------------------------------- */

    /**
     * constructeur qui initialise la date de creation au Datetime de la creation de l Event
     */
    public function __construct()
    {
        $this->created_at = new \DateTime('now');
    }

    /*-----------------------------------------------------------------------------------
     *                                         Getters - Setters 
    ----------------------------------------------------------------------------------- */

    #region

    /**
     * Get idEvent
     *
     * @return integer
     */
    public function getIdEvent(): ?int
    {
        return $this->idEvent;
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
    public function setImageName($imageName): self
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
     * @return Event
     */
    public function setImageFile(?File $imageFile = null): Event
    {
        $this->imageFile = $imageFile;
        if ($this->imageFile instanceof  UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }


    /**
     * Get title
     *
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug(): ?string
    {
        return (new Slugify())->slugify($this->title);
    }

    /**
     * Get startDateEvent
     *
     * @return \DateTimeInterface
     */
    public function getStartDateEvent(): ?\DateTimeInterface
    {
        return $this->startDateEvent;
    }

    /**
     * Set startDateEvent
     *
     * @param \DateTimeInterface $startDateEvent
     * @return self
     */
    public function setStartDateEvent(\DateTimeInterface $startDateEvent): self
    {
        $this->startDateEvent = $startDateEvent;
        return $this;
    }

    /**
     * Get endDateEvent
     *
     * @return \DateTimeInterface
     */
    public function getEndDateEvent(): ?\DateTimeInterface
    {
        return $this->endDateEvent;
    }

    /**
     * Set endDateEvent
     *
     * @param \DateTimeInterface $endDateEvent
     * @return self
     */
    public function setEndDateEvent(\DateTimeInterface $endDateEvent): self
    {
        $this->endDateEvent = $endDateEvent;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return self
     */
    public function setBody(string $body): self
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Get  created_at
     *
     * @return \DateTimeInterface|
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }
    /**
     * Set createa_at
     *
     * @param \DateTimeInterface $created_at
     * @return self
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->created_at = $createdAt;
        return $this;
    }

    /**
     * Get  updated_at
     *
     * @return \DateTimeInterface
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @param  \DateTime|null  $updated_at
     *
     * @return  self
     */
    public function setUpdated_at()
    {
        $this->updated_at = new \DateTime('now');
        return $this;
    }

    #endregion

}
