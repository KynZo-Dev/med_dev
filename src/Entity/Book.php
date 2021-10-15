<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ImgCover;

    /**
     * @ORM\Column(type="date")
     */
    private $Release_Date;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $Author;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $Genre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImgCover(): ?string
    {
        return $this->ImgCover;
    }

    public function setImgCover(?string $ImgCover): self
    {
        $this->ImgCover = $ImgCover;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->Release_Date;
    }

    public function setReleaseDate(\DateTimeInterface $Release_Date): self
    {
        $this->Release_Date = $Release_Date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->Author;
    }

    public function setAuthor(string $Author): self
    {
        $this->Author = $Author;

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
}
