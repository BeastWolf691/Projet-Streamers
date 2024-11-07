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
    private string  $nickname; //pseudo

    #[ORM\Column()]
    private string  $password;

    #[ORM\Column()]
    private string  $mail;

    #[ORM\Column()]
    private  DateTime $birthday;

    #[ORM\Column()]
    private   DateTime $dateToSign;

    // 1 carte peut avoir plusieurs catégories 
    #[ORM\OneToMany(targetEntity: Category::class, mappedBy: 'Users')]
    private Collection $thematic;

    // 1 carte peut avoir plusieurs catégories 
    #[ORM\OneToMany(targetEntity: Cards::class, mappedBy: 'Users')]
    private Collection $cards;

    #[ORM\Column()]
    private string  $deck;

    // Constructor
    public function __construct(
        string $name,
        string $lastName,
        string $nickname,
        string $mail,
        DateTime $birthday,
        DateTime $dateToSign,
        Collection $thematic,
        string $deck,
        Collection $cards
    ) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->nickname = $nickname;
        $this->mail = $mail;
        $this->birthday = $birthday;
        $this->dateToSign = $dateToSign;
        $this->thematic = $thematic;
        $this->deck = $deck;
        $this->cards = $cards;
    }
}
