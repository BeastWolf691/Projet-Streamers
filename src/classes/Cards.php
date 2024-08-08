<?php

namespace App\Classes;

use DateTime;
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
    #[ORM\Column(nullable:true)]
    private string $pTwitch;
    #[ORM\Column(nullable:true)]
    private string $pKick;
    #[ORM\Column(nullable:true)]
    private string $pTwitter;
    #[ORM\Column(nullable:true)]
    private string $pInstagram;
    #[ORM\Column(nullable:true)]
    private string $pTiktok;
    #[ORM\Column(nullable:true)]
    private string $pSnapchat;
    #[ORM\Column(nullable:true)]
    private string $videoOne;
    #[ORM\Column(nullable:true)]
    private string $videoTwo;
    #[ORM\Column(nullable:true)]
    private string $factOne;
    #[ORM\Column(nullable:true)]
    private string $factTwo;
    #[ORM\Column(nullable:true)]
    private string $factThree;
    #[ORM\Column()]
    private DateTime $birthdate;
        

    // 1 carte peut avoir plusieurs catégories 
    #[ORM\OneToMany(targetEntity: Categories::class, mappedBy: 'cards')]
    private Collection $Thematic;




    // Constructor
    public function __construct(
        int $id,
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
        $this->id = $id;
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
