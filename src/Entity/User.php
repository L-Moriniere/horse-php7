<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 40)]
    private $username;

    #[ORM\Column(type: 'string', length: 80)]
    private $mail;

    #[ORM\Column(type: 'string', length: 150)]
    private $password;

    #[ORM\Column(type: 'string', length: 60, nullable: true)]
    private $firstName;

    #[ORM\Column(type: 'string', length: 60, nullable: true)]
    private $lastName;

    #[ORM\Column(type: 'string', length: 1, nullable: true)]
    private $gender;

    #[ORM\Column(type: 'date')]
    private $birthDate;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $phoneNumber;

    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    private $adress;

    #[ORM\Column(type: 'blob', nullable: true)]
    private $avatar;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $website;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $createDate;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $lastLogin;

    #[ORM\Column(type: 'string', length: 15, nullable: true)]
    private $ipAdress;

    #[ORM\OneToOne(inversedBy: 'idUser', targetEntity: BankAccount::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $idBankAccount;

    #[ORM\OneToMany(mappedBy: 'idUser', targetEntity: EquestrianCenter::class)]
    private $idEquestrianCenter;

    #[ORM\OneToMany(mappedBy: 'idUser', targetEntity: RidingClub::class)]
    private $ridingClub;

    public function __construct()
    {
        $this->idEquestrianCenter = new ArrayCollection();
        $this->ridingClub = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(?string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getCreateDate(): ?\DateTimeInterface
    {
        return $this->createDate;
    }

    public function setCreateDate(?\DateTimeInterface $createDate): self
    {
        $this->createDate = $createDate;

        return $this;
    }

    public function getLastLogin(): ?\DateTimeInterface
    {
        return $this->lastLogin;
    }

    public function setLastLogin(?\DateTimeInterface $lastLogin): self
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    public function getIpAdress(): ?string
    {
        return $this->ipAdress;
    }

    public function setIpAdress(?string $ipAdress): self
    {
        $this->ipAdress = $ipAdress;

        return $this;
    }

    public function getIdBankAccount(): ?BankAccount
    {
        return $this->idBankAccount;
    }

    public function setIdBankAccount(BankAccount $idBankAccount): self
    {
        $this->idBankAccount = $idBankAccount;

        return $this;
    }

    /**
     * @return Collection<int, EquestrianCenter>
     */
    public function getIdEquestrianCenter(): Collection
    {
        return $this->idEquestrianCenter;
    }

    public function addIdEquestrianCenter(EquestrianCenter $idEquestrianCenter): self
    {
        if (!$this->idEquestrianCenter->contains($idEquestrianCenter)) {
            $this->idEquestrianCenter[] = $idEquestrianCenter;
            $idEquestrianCenter->setIdUser($this);
        }

        return $this;
    }

    public function removeIdEquestrianCenter(EquestrianCenter $idEquestrianCenter): self
    {
        if ($this->idEquestrianCenter->removeElement($idEquestrianCenter)) {
            // set the owning side to null (unless already changed)
            if ($idEquestrianCenter->getIdUser() === $this) {
                $idEquestrianCenter->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RidingClub>
     */
    public function getRidingClub(): Collection
    {
        return $this->ridingClub;
    }

    public function addRidingClub(RidingClub $ridingClub): self
    {
        if (!$this->ridingClub->contains($ridingClub)) {
            $this->ridingClub[] = $ridingClub;
            $ridingClub->setIdUser($this);
        }

        return $this;
    }

    public function removeRidingClub(RidingClub $ridingClub): self
    {
        if ($this->ridingClub->removeElement($ridingClub)) {
            // set the owning side to null (unless already changed)
            if ($ridingClub->getIdUser() === $this) {
                $ridingClub->setIdUser(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->username;
    }
}
