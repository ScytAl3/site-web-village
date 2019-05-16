<?php

namespace App\Entity;

use App\Entity\Picture;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Event
 * 
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 * @ORM\HasLifecycleCallbacks() 
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
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $zip_code;

    /**
     * @ORM\Column(type="float", scale=4, precision=6)
     */
    private $lat;

    /**
     * @ORM\Column(type="float", scale=4, precision=7)
     */
    private $lng;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Picture", mappedBy="event", orphanRemoval=true, cascade={"persist"})
     */
    private $pictures;

    /**
     * @Assert\All({
     *      @Assert\Image(mimeTypes="image/jpeg")
     * })
     */
    private $pictureFiles;

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
        $this->pictures = new ArrayCollection();
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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getZipCode(): ?int
    {
        return $this->zip_code;
    }

    public function setZipCode(?int $zip_code): self
    {
        $this->zip_code = $zip_code;
        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;
        return $this;
    }

    public function getLng(): ?float
    {
        return $this->lng;
    }

    public function setLng(float $lng): self
    {
        $this->lng = $lng;
        return $this;
    }

    /**
     * Get })
     */
    public function getPictureFiles()
    {
        return $this->pictureFiles;
    }

    /**
     * Set })
     *
     * @return  Event
     */
    public function setPictureFiles($pictureFiles): self
    {
        // On parcourt les images ajoutees
        foreach ($pictureFiles as $pictureFile) {
            // A chaque image on instancie d une photo
            $picture = new Picture();
            // On defini le fichier avec la methode setImageFile() de Picture
            $picture->setImageFile($pictureFile);
            // On ajoute la nouvelle image a cette instance de Event
            $this->addPicture($picture);
        }
        $this->pictureFiles = $pictureFiles;
        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    /**
     * Retourne la premiere image de la collection si elle existe
     *
     * @return Picture|null
     */
    public function getPicture(): ?Picture
    {
        if ($this->pictures->isEmpty()) {
            return \null;
        }
        return $this->pictures->first();
    }

    #endregion

    /*-----------------------------------------------------------------------------------
     *                                         Methods
    ----------------------------------------------------------------------------------- */

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setEvent($this);
        }
        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->contains($picture)) {
            $this->pictures->removeElement($picture);
            // set the owning side to null (unless already changed)
            if ($picture->getEvent() === $this) {
                $picture->setEvent(null);
            }
        }
        return $this;
    }
}
