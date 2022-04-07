<?php

namespace App\Entity;

use App\Repository\EquestrianCenterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquestrianCenterRepository::class)]
class EquestrianCenter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $capacity;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'idEquestrianCenter')]
    private $idUser;

    #[ORM\OneToMany(mappedBy: 'equestrianCenter', targetEntity: Infrastructure::class)]
    private $infrastructures;

    #[ORM\ManyToMany(targetEntity: Task::class)]
    private $task;

    public function __construct()
    {
        $this->infrastructures = new ArrayCollection();
        $this->task = new ArrayCollection();
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

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

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
            $infrastructure->setEquestrianCenter($this);
        }

        return $this;
    }

    public function removeInfrastructure(Infrastructure $infrastructure): self
    {
        if ($this->infrastructures->removeElement($infrastructure)) {
            // set the owning side to null (unless already changed)
            if ($infrastructure->getEquestrianCenter() === $this) {
                $infrastructure->setEquestrianCenter(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Task>
     */
    public function getTask(): Collection
    {
        return $this->task;
    }

    public function addTask(Task $task): self
    {
        if (!$this->task->contains($task)) {
            $this->task[] = $task;
        }

        return $this;
    }

    public function removeTask(Task $task): self
    {
        $this->task->removeElement($task);

        return $this;
    }

    public function __toString(): string
    {
        return "Equestrian Center";
    }
}
