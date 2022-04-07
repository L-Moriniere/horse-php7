<?php

namespace App\Entity;

use App\Repository\NewspaperRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewspaperRepository::class)]
class Newspaper
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\ManyToMany(targetEntity: Event::class)]
    private $agenda;

    #[ORM\OneToOne(targetEntity: Article::class, cascade: ['persist', 'remove'])]
    private $miscellaenous;

    #[ORM\OneToOne(targetEntity: Article::class, cascade: ['persist', 'remove'])]
    private $meteo;

    #[ORM\OneToOne(targetEntity: Article::class, cascade: ['persist', 'remove'])]
    private $ad;

    public function __construct()
    {
        $this->agenda = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getAgenda(): Collection
    {
        return $this->agenda;
    }

    public function addAgenda(Event $agenda): self
    {
        if (!$this->agenda->contains($agenda)) {
            $this->agenda[] = $agenda;
        }

        return $this;
    }

    public function removeAgenda(Event $agenda): self
    {
        $this->agenda->removeElement($agenda);

        return $this;
    }

    public function getMiscellaenous(): ?Article
    {
        return $this->miscellaenous;
    }

    public function setMiscellaenous(?Article $miscellaenous): self
    {
        $this->miscellaenous = $miscellaenous;

        return $this;
    }

    public function getMeteo(): ?Article
    {
        return $this->meteo;
    }

    public function setMeteo(?Article $meteo): self
    {
        $this->meteo = $meteo;

        return $this;
    }

    public function getAd(): ?Article
    {
        return $this->ad;
    }

    public function setAd(?Article $ad): self
    {
        $this->ad = $ad;

        return $this;
    }

    public function __toString(): string
    {
        return "Newspaper";
    }
}
