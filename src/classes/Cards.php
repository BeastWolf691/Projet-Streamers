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
    private string $nickname;
    #[ORM\Column()]
    private string $mainCat;
    #[ORM\Column()]
    private string $thematic;
    #[ORM\Column()]
    private string $picture;
    #[ORM\Column()]
    private string $name;
    #[ORM\Column()]
    private string $language;
    #[ORM\Column()]
    private string $pYoutube;
    #[ORM\Column()]
    private string $pTwitch;
    #[ORM\Column()]
    private string $pKick;
    #[ORM\Column()]
    private string $pTwitter;
    #[ORM\Column()]
    private string $pInstagram;
    #[ORM\Column()]
    private string $pTiktok;
    #[ORM\Column()]
    private string $pSnapchat;
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
    private Collection $Thematic;

    // plujsieurs cartes peuvent avoir plusieurs categories ??????
    // #[ORM\ManyToMany(targetEntity : Services ::class, inversedBy : 'hotelList')]
    // #[JoinTable(name: 'service_hotel')]


    // Constructor
    public function __construct(
        string $nickname,
        string $mainCat,
        string $thematic,
        string $picture,
        string $name,
        string $language,
        string $pYoutube,
        string $pTwitch,
        string $pKick,
        string $pTwitter,
        string $pInstagram,
        string $pTiktok,
        string $pSnapchat,
        string $videoOne,
        string $videoTwo,
        string $factOne,
        string $factTwo,
        string $factThree
    ) {
        $this->nickname = $nickname;
        $this->mainCat = $mainCat;
        $this->thematic = $thematic;
        $this->picture = $picture;
        $this->name = $name;
        $this->language = $language;
        $this->pYoutube = $pYoutube;
        $this->pTwitch = $pTwitch;
        $this->pKick = $pKick;
        $this->pTwitter = $pTwitter;
        $this->pInstagram = $pInstagram;
        $this->pTiktok = $pTiktok;
        $this->pSnapchat = $pSnapchat;

        $this->videoOne = $videoOne;
        $this->videoTwo = $videoTwo;
        $this->factOne = $factOne;
        $this->factTwo = $factTwo;
        $this->factThree = $factThree;
    }
}
