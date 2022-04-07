<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $type;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $level;

    #[ORM\Column(type: 'blob', nullable: true)]
    private $description;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $price;

    #[ORM\ManyToOne(targetEntity: ItemFamily::class)]
    private $idItemFamily;


    #[ORM\ManyToMany(targetEntity: Contest::class)]
    private $id_contest;

    public function __construct()
    {
        $this->id_contest = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getIdItemFamily(): ?ItemFamily
    {
        return $this->idItemFamily;
    }

    public function setIdItemFamily(?ItemFamily $idItemFamily): self
    {
        $this->idItemFamily = $idItemFamily;

        return $this;
    }

    /**
     * @return Collection<int, Contest>
     */
    public function getIdContest(): Collection
    {
        return $this->id_contest;
    }

    public function addIdContest(Contest $idContest): self
    {
        if (!$this->id_contest->contains($idContest)) {
            $this->id_contest[] = $idContest;
        }

        return $this;
    }

    public function removeIdContest(Contest $idContest): self
    {
        $this->id_contest->removeElement($idContest);

        return $this;
    }

    public function __toString(): string
    {
        return "Item";
    }
}
