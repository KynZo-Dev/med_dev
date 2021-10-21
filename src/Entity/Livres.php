<?php

namespace App\Entity;

use App\Repository\LivresRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivresRepository::class)
 */
class Livres
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Auteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Genre;

    /**
     * @ORM\Column(type="date")
     */
    private $Parution;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ImgCouverture;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Disponible;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->Auteur;
    }

    public function setAuteur(string $Auteur): self
    {
        $this->Auteur = $Auteur;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->Genre;
    }

    public function setGenre(string $Genre): self
    {
        $this->Genre = $Genre;

        return $this;
    }

    public function getParution(): ?\DateTimeInterface
    {
        return $this->Parution;
    }

    public function setParution(\DateTimeInterface $Parution): self
    {
        $this->Parution = $Parution;

        return $this;
    }

    public function getImgCouverture(): ?string
    {
        return $this->ImgCouverture;
    }

    public function setImgCouverture(string $ImgCouverture): self
    {
        $this->ImgCouverture = $ImgCouverture;

        return $this;
    }

    public function getDisponible(): ?bool
    {
        return $this->Disponible;
    }

    public function setDisponible(bool $Disponible): self
    {
        $this->Disponible = $Disponible;

        return $this;
    }
}
