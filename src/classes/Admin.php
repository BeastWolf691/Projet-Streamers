<?php

namespace App\Classes;

use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Admin
{

    // Property
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private int $id;

    #[ORM\Column()]
    private string $name;

    #[ORM\Column()]
    private string $lastName;

    #[ORM\Column()]
    private string $nickname;

    #[ORM\Column()]
    private string $password;

    #[ORM\Column()]
    private string $mail;

    #[ORM\Column()]
    private string $picture;

    // Constructor
    public function __construct(string $name, string $lastName, string $nickname, string $password, string $mail, string $picture)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->nickname = $nickname;
        $this->setPassword($password);
        $this->mail = $mail;
        $this->picture = $picture;
    }

    // Getters and Setters
    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    public function getNickname(): string {
        return $this->nickname;
    }

    public function setNickname(string $nickname): void {
        $this->nickname = $nickname;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function getMail(): string {
        return $this->mail;
    }

    public function setMail(string $mail): void {
        $this->mail = $mail;
    }

    public function getPicture(): string {
        return $this->picture;
    }

    public function setPicture(string $picture): void {
        $this->picture = $picture;
    }
}
