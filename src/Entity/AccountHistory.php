<?php

namespace App\Entity;

use App\Repository\AccountHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccountHistoryRepository::class)]
class AccountHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $operation;

    #[ORM\ManyToOne(targetEntity: BankAccount::class)]
    private $idBankAccount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getOperation(): ?int
    {
        return $this->operation;
    }

    public function setOperation(?int $operation): self
    {
        $this->operation = $operation;

        return $this;
    }

    public function getIdBankAccount(): ?BankAccount
    {
        return $this->idBankAccount;
    }

    public function setIdBankAccount(?BankAccount $idBankAccount): self
    {
        $this->idBankAccount = $idBankAccount;

        return $this;
    }

    public function __toString(): string
    {
        return "Account History";
    }
}
