<?php

namespace App\Entity;

use App\Repository\HorseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorseRepository::class)]
class Horse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 60)]
    private $name;

    #[ORM\Column(type: 'string', length: 60)]
    private $race;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $speed;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $stamina;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $jump_height;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $strength;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $sociability;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $intelligence;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $temperament;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $experience;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $level;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $general_stat;

    #[ORM\ManyToOne(targetEntity: ExhaustState::class)]
    private $id_exhaust_state;

    #[ORM\ManyToOne(targetEntity: HealthState::class)]
    private $id_health_state;

    #[ORM\ManyToOne(targetEntity: StressState::class)]
    private $id_stress_state;

    #[ORM\ManyToOne(targetEntity: MoralState::class)]
    private $id_moral_state;

    #[ORM\ManyToOne(targetEntity: HungerState::class)]
    private $id_hunger_state;

    #[ORM\ManyToOne(targetEntity: CleanState::class)]
    private $id_clean_state;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private $id_user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(string $race): self
    {
        $this->race = $race;

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

    public function getSpeed(): ?int
    {
        return $this->speed;
    }

    public function setSpeed(?int $speed): self
    {
        $this->speed = $speed;

        return $this;
    }

    public function getStamina(): ?int
    {
        return $this->stamina;
    }

    public function setStamina(?int $stamina): self
    {
        $this->stamina = $stamina;

        return $this;
    }

    public function getJumpHeight(): ?int
    {
        return $this->jump_height;
    }

    public function setJumpHeight(int $jump_height): self
    {
        $this->jump_height = $jump_height;

        return $this;
    }

    public function getStrength(): ?int
    {
        return $this->strength;
    }

    public function setStrength(?int $strength): self
    {
        $this->strength = $strength;

        return $this;
    }

    public function getSociability(): ?int
    {
        return $this->sociability;
    }

    public function setSociability(?int $sociability): self
    {
        $this->sociability = $sociability;

        return $this;
    }

    public function getIntelligence(): ?int
    {
        return $this->intelligence;
    }

    public function setIntelligence(?int $intelligence): self
    {
        $this->intelligence = $intelligence;

        return $this;
    }

    public function getTemperament(): ?int
    {
        return $this->temperament;
    }

    public function setTemperament(?int $temperament): self
    {
        $this->temperament = $temperament;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(?int $experience): self
    {
        $this->experience = $experience;

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

    public function getGeneralStat(): ?int
    {
        return $this->general_stat;
    }

    public function setGeneralStat(?int $general_stat): self
    {
        $this->general_stat = $general_stat;

        return $this;
    }

    public function getIdExhaustState(): ?ExhaustState
    {
        return $this->id_exhaust_state;
    }

    public function setIdExhaustState(?ExhaustState $id_exhaust_state): self
    {
        $this->id_exhaust_state = $id_exhaust_state;

        return $this;
    }

    public function getIdHealthState(): ?HealthState
    {
        return $this->id_health_state;
    }

    public function setIdHealthState(?HealthState $id_health_state): self
    {
        $this->id_health_state = $id_health_state;

        return $this;
    }

    public function getIdStressState(): ?StressState
    {
        return $this->id_stress_state;
    }

    public function setIdStressState(?StressState $id_stress_state): self
    {
        $this->id_stress_state = $id_stress_state;

        return $this;
    }

    public function getIdMoralState(): ?MoralState
    {
        return $this->id_moral_state;
    }

    public function setIdMoralState(?MoralState $id_moral_state): self
    {
        $this->id_moral_state = $id_moral_state;

        return $this;
    }

    public function getIdHungerState(): ?HungerState
    {
        return $this->id_hunger_state;
    }

    public function setIdHungerState(?HungerState $id_hunger_state): self
    {
        $this->id_hunger_state = $id_hunger_state;

        return $this;
    }

    public function getIdCleanState(): ?CleanState
    {
        return $this->id_clean_state;
    }

    public function setIdCleanState(?CleanState $id_clean_state): self
    {
        $this->id_clean_state = $id_clean_state;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function __toString(): string
    {
        return "Horse";
    }
}
