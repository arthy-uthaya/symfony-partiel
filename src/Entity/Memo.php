<?php

namespace App\Entity;

use App\Repository\MemoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MemoRepository::class)
 */
class Memo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $expiration_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getExpirationDate(): ?int
    {
        return $this->expiration_date;
    }

    public function setExpirationDate(?int $expiration_date): self
    {
        $this->expiration_date = $expiration_date;

        return $this;
    }
}
