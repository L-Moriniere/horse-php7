<?php

namespace App\Entity;

use App\Repository\RidingClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RidingClubRepository::class)]
class RidingClub
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $capacity;

    #[ORM\ManyToMany(targetEntity: Item::class)]
    private $items;

    #[ORM\ManyToMany(targetEntity: Infrastructure::class)]
    private $infrastructures;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'ridingClub')]
    private $idUser;

    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->infrastructures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * @return Collection<int, Item>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        $this->items->removeElement($item);

        return $this;
    }

    /**
     * @return Collection<int, Infrastructure>
     */
    public function getInfrastructures(): Collection
    {
        return $this->infrastructures;
    }

    public function addInfrastructure(Infrastructure $infrastructure): self
    {
        if (!$this->infrastructures->contains($infrastructure)) {
            $this->infrastructures[] = $infrastructure;
        }

        return $this;
    }

    public function removeInfrastructure(Infrastructure $infrastructure): self
    {
        $this->infrastructures->removeElement($infrastructure);

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function __toString(): string
    {
        return "Ridding Club";
    }
}
