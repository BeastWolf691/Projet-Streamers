<?php
namespace App\Classes;

use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Admin {

    // Property
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private int $id;

    #[ORM\Column()]
    private string  $name;

    #[ORM\Column()]
    private string  $lastName;

    #[ORM\Column()]
    private string  $username;//pseudo

    #[ORM\Column()]
    private string  $password;

    #[ORM\Column()]
    private string  $mail;

    #[ORM\Column()]
    private string  $picture;
   
    // Constructor
    public function __construct(string $name,string $lastName,string $username,string $mail, string $picture) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->mail = $mail;
        $this->picture = $picture;
    }
}



