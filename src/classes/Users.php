<?php
namespace App\Classes;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
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

    // Relation ManyToMany avec Cards via l'entité de jointure
    #[ORM\ManyToMany(targetEntity: Cards::class, mappedBy: 'users')]
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
        string $deck,
    ) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->nickname = $nickname;
        $this->mail = $mail;
        $this->birthday = $birthday;
        $this->dateToSign = $dateToSign;
        $this->deck = $deck;
        $this->cards = new ArrayCollection();
    }
    public function getCards(): Collection
    {
        return $this->cards;
    }
    public function addCard(Cards $card): void
{
    if (!$this->cards->contains($card)) {
        $this->cards->add($card);
    }
}

}
