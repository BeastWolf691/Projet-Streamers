<?php

namespace App\Classes;

use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
class Creator{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private int $id;

    #[ORM\Column()]
    private string  $name;

    #[ORM\Column()]
    private string  $lastName;//nullable

    #[ORM\Column()]
    private string  $username;//pseudo

    #[ORM\Column()]
    private string  $mail;

    #[ORM\Column()]
    private DateTime $birthday;

    //1 creator peut avoirplusieurs categories 
    #[ORM\OneToMany(targetEntity : Categories::class, mappedBy : 'creator')]
    private Collection $categories;        

     //1 createur peut avoir plusieurs cartes
    // #[ORM\OneToMany(targetEntity : Cards::class, mappedBy : 'creator')]
    // private Collection

    #[ORM\Column()]
    private string $cards;


    // Constructor
    public function __construct(string $name,string $lastName,string $username,string $mail,DateTime $birthday,Collection $categories,string $cards) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->mail = $mail;
        $this->birthday = $birthday;
        $this->categories = $categories;
        $this->cards = $cards;
    }
}