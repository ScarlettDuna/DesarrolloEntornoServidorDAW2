<?php

namespace App\Entity;

use App\Repository\OutfitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OutfitRepository::class)]
class Outfit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?People $people = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pants $pants = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Footwear $footwear = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tshirts $tshirt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPeople(): ?People
    {
        return $this->people;
    }

    public function setPeople(?People $people): static
    {
        $this->people = $people;

        return $this;
    }

    public function getPants(): ?Pants
    {
        return $this->pants;
    }

    public function setPants(?Pants $pants): static
    {
        $this->pants = $pants;

        return $this;
    }

    public function getFootwear(): ?Footwear
    {
        return $this->footwear;
    }

    public function setFootwear(?Footwear $footwear): static
    {
        $this->footwear = $footwear;

        return $this;
    }

    public function getTshirt(): ?Tshirts
    {
        return $this->tshirt;
    }

    public function setTshirt(?Tshirts $tshirt): static
    {
        $this->tshirt = $tshirt;

        return $this;
    }
}
