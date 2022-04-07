<?php

namespace App\Entity;

use App\Repository\InfrastructureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InfrastructureRepository::class)]
class Infrastructure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 20)]
    private $type;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $level;

    #[ORM\Column(type: 'blob', nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $family;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $price;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $resources;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $capacityItems;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $capacityHorse;

    #[ORM\ManyToOne(targetEntity: EquestrianCenter::class, inversedBy: 'infrastructures')]
    private $equestrianCenter;

    #[ORM\ManyToMany(targetEntity: Item::class)]
    private $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(?string $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getResources(): ?int
    {
        return $this->resources;
    }

    public function setResources(?int $resources): self
    {
        $this->resources = $resources;

        return $this;
    }

    public function getCapacityItems(): ?int
    {
        return $this->capacityItems;
    }

    public function setCapacityItems(?int $capacityItems): self
    {
        $this->capacityItems = $capacityItems;

        return $this;
    }

    public function getCapacityHorse(): ?int
    {
        return $this->capacityHorse;
    }

    public function setCapacityHorse(?int $capacityHorse): self
    {
        $this->capacityHorse = $capacityHorse;

        return $this;
    }

    public function getEquestrianCenter(): ?EquestrianCenter
    {
        return $this->equestrianCenter;
    }

    public function setEquestrianCenter(?EquestrianCenter $equestrianCenter): self
    {
        $this->equestrianCenter = $equestrianCenter;

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

    public function __toString(): string
    {
        return "Infrastructure";
    }
}
