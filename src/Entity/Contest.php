<?php

namespace App\Entity;

use App\Repository\ContestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContestRepository::class)]
class Contest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $start_date;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $end_date;

    #[ORM\ManyToOne(targetEntity: Infrastructure::class)]
    private $id_infrastructure;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(?\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getIdInfrastructure(): ?Infrastructure
    {
        return $this->id_infrastructure;
    }

    public function setIdInfrastructure(?Infrastructure $id_infrastructure): self
    {
        $this->id_infrastructure = $id_infrastructure;

        return $this;
    }

    public function __toString(): string
    {
        return "Contest";
    }
}
