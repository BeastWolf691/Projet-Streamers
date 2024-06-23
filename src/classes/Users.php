<?php
namespace App\Classes;

use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private int $id;

    #[ORM\Column()]
    private string  $name;

    #[ORM\Column()]
    private string  $lastName;

    #[ORM\Column()]
    private string  $username; //pseudo

    #[ORM\Column()]
    private string  $password;

    #[ORM\Column()]
    private string  $mail;

    #[ORM\Column()]
    private  DateTime $birthday;

    #[ORM\Column()]
    private   DateTime $dateToSign;

    // 1 carte peu avoir plusieurs categories 
    #[ORM\OneToMany(targetEntity: Categories::class, mappedBy: 'Users')]
    private Collection $categories;

    // 1 carte peu avoir plusieurs categories 
    #[ORM\OneToMany(targetEntity: Cards::class, mappedBy: 'Users')]
    private Collection $cards;

    #[ORM\Column()]
    private string  $deck;

    // Constructor
    public function __construct(
        string $name,
        string $lastName,
        string $username,
        string $mail,
        DateTime $birthday,
        DateTime $dateToSign,
        Collection $categories,
        string $deck,
        Collection $cards
    ) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->mail = $mail;
        $this->birthday = $birthday;
        $this->dateToSign = $dateToSign;
        $this->categories = $categories;
        $this->deck = $deck;
        $this->cards = $cards;
    }
}