<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 * 
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 * @ORM\HasLifecycleCallbacks
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
     * @ORM\Column(name="create_at", type="datetime")
     */
    private $createAt;

    #endregion

    /*-----------------------------------------------------------------------------------
     *                                         Constructeur
    ----------------------------------------------------------------------------------- */

    /**
     * constructeur qui initialise la date de creation au Datetime de la creation de l Event
     */
    public function __construct()
    {
        $this->createAt = new \DateTime();
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
     * @return string|null
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
     * Get  createAt
     *
     * @return \DateTimeInterface|null
     */
    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    /**
     * Set createAt
     *
     * @param \DateTimeInterface $createAt
     * @return self
     */
    public function setCreateAt(\DateTimeInterface $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    #endregion
}
