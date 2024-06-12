<?php

namespace App\Classes;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Cards
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private int $id;

    #[ORM\Column()]
    private string $pseudo;
    #[ORM\Column()]
    private string $MainCat;
    #[ORM\Column()]
    private string $Categories;
    #[ORM\Column()]
    private string $picture;
    #[ORM\Column()]
    private string $name;
    #[ORM\Column()]
    private string $language;
    #[ORM\Column()]
    private string $PYoutube;
    #[ORM\Column()]
    private string $Ptwitch;
    #[ORM\Column()]
    private string $PKick;
    #[ORM\Column()]
    private string $PTwitter;
    #[ORM\Column()]
    private string $PInstagram;
    #[ORM\Column()]
    private string $PTiktok;
    #[ORM\Column()]
    private string $videoOne;
    #[ORM\Column()]
    private string $videoTwo;
    #[ORM\Column()]
    private string $factOne;
    #[ORM\Column()]
    private string $factTwo;
    #[ORM\Column()]
    private string $factThree;

    // plusieurs cartes peuvent concernées 1 createur
    // #[ORM\ManyToOne(targetEntity : Creator::class, inversedBy: 'cards')]
    // private Categories $creator;

    // 1 carte peu avoir plusieurs categories 
    #[ORM\OneToMany(targetEntity: Categories::class, mappedBy: 'cards')]
    private Collection $categories;

    // plujsieurs cartes peuvent avoir plusieurs categories ??????
    // #[ORM\ManyToMany(targetEntity : Services ::class, inversedBy : 'hotelList')]
    // #[JoinTable(name: 'service_hotel')]


    // Constructor
    public function __construct(
        string $pseudo,
        string $MainCat,
        string $Categories,
        string $picture,
        string $name,
        string $language,
        string $PYoutube,
        string $Ptwitch,
        string $PKick,
        string $PTwitter,
        string $PInstagram,
        string $PTiktok,
        string $videoOne,
        string $videoTwo,
        string $factOne,
        string $factTwo,
        string $factThree
    ) {
        $this->pseudo = $pseudo;
        $this->MainCat = $MainCat;
        $this->Categories = $Categories;
        $this->picture = $picture;
        $this->name = $name;
        $this->language = $language;
        $this->PYoutube = $PYoutube;
        $this->Ptwitch = $Ptwitch;
        $this->PKick = $PKick;
        $this->PTwitter = $PTwitter;
        $this->PInstagram = $PInstagram;
        $this->PTiktok = $PTiktok;
        $this->videoOne = $videoOne;
        $this->videoTwo = $videoTwo;
        $this->factOne = $factOne;
        $this->factTwo = $factTwo;
        $this->factThree = $factThree;
    }
}
