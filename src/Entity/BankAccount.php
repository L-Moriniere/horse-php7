<?php

namespace App\Entity;

use App\Repository\BankAccountRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BankAccountRepository::class)]
class BankAccount
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $amount;

    #[ORM\OneToOne(mappedBy: 'idBankAccount', targetEntity: User::class, cascade: ['persist', 'remove'])]
    private $idUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(User $idUser): self
    {
        // set the owning side of the relation if necessary
        if ($idUser->getIdBankAccount() !== $this) {
            $idUser->setIdBankAccount($this);
        }

        $this->idUser = $idUser;

        return $this;
    }

    public function __toString(): string
    {
        return "Bank Account";
    }
}
