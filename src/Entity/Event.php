<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Event
 * 
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 * @ORM\HasLifecycleCallbacks
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
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $imageName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="event_image", fileNameProperty="imageName")
     * 
     * @var File
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
     * @ORM\Column(name="create_at", type="datetime")
     */
    private $create_at;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="update_at", type="datetime", nullable=true)
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
        $this->create_at = new \DateTime('now');
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
     * Get nOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @return  File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set nOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @param  File|null  $imageFile  NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @return  self
     */
    public function setImageFile(File $imageFile): self
    {
        $this->imageFile = $imageFile;
        if ($this->imageFile instanceof  UploadedFile) {
            $this->update_at = new \DateTime('now');
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
     * Get  create_at
     *
     * @return \DateTimeInterface
     */
    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->create_at;
    }

    /**
     * Set create_at
     *
     * @param \DateTimeInterface $create_at
     * @return self
     */
    public function setCreateAt(\DateTimeInterface $create_at): self
    {
        $this->create_at = $create_at;

        return $this;
    }

    /**
     * Get  update_at
     *
     * @return \DateTimeInterface
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTimeInterface $updated_at
     * @return self
     */
    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    #endregion

}
