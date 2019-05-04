<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 * 
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="App\Repository\EvenementRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Evenement
{

    /*-----------------------------------------------------------------------------------
     *                                              Properties 
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     * 
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     * 
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     * 
     * @ORM\Column(name="corps", type="text")
     */
    private $corps;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="cree_le", type="datetime")
     */
    private $createAt;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="modifie_le", type="datetime", nullable=true)
     */
    private $updateAt;

    #endregion

    /*-----------------------------------------------------------------------------------
     *                                              Getters - Setters 
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
     * Get titre
     *
     * @return string
     */
    public function getTitre(): ?string
    {
        return $this->titre;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return self
     */
    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return self
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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
     * Get corps
     *
     * @return string
     */
    public function getCorps(): ?string
    {
        return $this->corps;
    }

    /**
     * Set corps
     *
     * @param string $corps
     * @return self
     */
    public function setCorps(string $corps): self
    {
        $this->corps = $corps;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTimeInterface
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

    /**
     * Get updateAt
     *
     * @return \DateTimeInterface|null
     */
    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    /**
     * Set updateAt
     *
     * @param \DateTimeInterface|null $updateAt
     * @return self
     */
    public function setUpdateAt(?\DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    #endregion
}
