<?php

namespace App\Entity;

use App\Repository\ResaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResaRepository::class)
 */
class Resa
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="Resas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Users;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $ResaAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $ResaMaxAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $ResaLongAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $ResaLongMaxAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsers(): ?Users
    {
        return $this->Users;
    }

    public function setUsers(?Users $Users): self
    {
        $this->Users = $Users;

        return $this;
    }

    public function getResaAt(): ?\DateTimeImmutable
    {
        return $this->ResaAt;
    }

    public function setResaAt(\DateTimeImmutable $ResaAt): self
    {
        $this->ResaAt = $ResaAt;

        return $this;
    }

    public function getResaMaxAt(): ?\DateTimeInterface
    {
        return $this->ResaMaxAt;
    }

    public function setResaMaxAt(?\DateTimeInterface $ResaMaxAt): self
    {
        $this->ResaMaxAt = $ResaMaxAt;

        return $this;
    }

    public function getResaLongAt(): ?\DateTimeImmutable
    {
        return $this->ResaLongAt;
    }

    public function setResaLongAt(?\DateTimeImmutable $ResaLongAt): self
    {
        $this->ResaLongAt = $ResaLongAt;

        return $this;
    }

    public function getResaLongMaxAt(): ?\DateTimeInterface
    {
        return $this->ResaLongMaxAt;
    }

    public function setResaLongMaxAt(?\DateTimeInterface $ResaLongMaxAt): self
    {
        $this->ResaLongMaxAt = $ResaLongMaxAt;

        return $this;
    }
}
