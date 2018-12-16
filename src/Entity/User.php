<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numCard;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="integer")
     */
    private $levelUser;

    /**
     * @ORM\Column(type="integer")
     */
    private $adresse;

    /**
     * @ORM\Column(type="boolean")
     */
    private $statement;

    /**
     * @ORM\Column(type="date")
     */
    private $inscription;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumCard(): ?string
    {
        return $this->numCard;
    }

    public function setNumCard(string $numCard): self
    {
        $this->numCard = $numCard;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

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

    public function getLevelUser(): ?int
    {
        return $this->levelUser;
    }

    public function setLevelUser(int $levelUser): self
    {
        $this->levelUser = $levelUser;

        return $this;
    }

    public function getAdresse(): ?int
    {
        return $this->adresse;
    }

    public function setAdresse(int $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getStatement(): ?bool
    {
        return $this->statement;
    }

    public function setStatement(bool $statement): self
    {
        $this->statement = $statement;

        return $this;
    }

    public function getInscription(): ?\DateTimeInterface
    {
        return $this->inscription;
    }

    public function setInscription(\DateTimeInterface $inscription): self
    {
        $this->inscription = $inscription;

        return $this;
    }
}
