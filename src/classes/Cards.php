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
    #[ORM\Column(nullable: true)]
    private string $secondCat;
    #[ORM\Column()]
    private string $thematic;
    #[ORM\Column()]
    private string $picture;
    #[ORM\Column()]
    private string $name;
    #[ORM\Column()]
    private string $language;
    #[ORM\Column(nullable: true)]
    private string $pYoutube;
    #[ORM\Column(nullable: true)]
    private string $pTwitch;
    #[ORM\Column(nullable: true)]
    private string $pKick;
    #[ORM\Column(nullable: true)]
    private string $pTwitter;
    #[ORM\Column(nullable: true)]
    private string $pInstagram;
    #[ORM\Column(nullable: true)]
    private string $pTiktok;
    #[ORM\Column(nullable: true)]
    private string $factOne;
    #[ORM\Column(nullable: true)]
    private string $factTwo;
    #[ORM\Column(nullable: true)]
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
        string $secondCat,
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
        string $factOne,
        string $factTwo,
        string $factThree
    ) {
        $this->id = $id;
        $this->nickname = $nickname;
        $this->mainCat = $mainCat;
        $this->secondCat = $secondCat;
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
        $this->factOne = $factOne;
        $this->factTwo = $factTwo;
        $this->factThree = $factThree;
    }
    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getMainCat(): string
    {
        return $this->mainCat;
    }

    public function getSecondCat(): ?string
    {
        return $this->secondCat;
    }

    public function getThematic(): string
    {
        return $this->thematic;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getPYoutube(): ?string
    {
        return $this->pYoutube;
    }

    public function getPTwitch(): ?string
    {
        return $this->pTwitch;
    }

    public function getPKick(): ?string
    {
        return $this->pKick;
    }

    public function getPTwitter(): ?string
    {
        return $this->pTwitter;
    }

    public function getPInstagram(): ?string
    {
        return $this->pInstagram;
    }

    public function getPTiktok(): ?string
    {
        return $this->pTiktok;
    }

    public function getFactOne(): ?string
    {
        return $this->factOne;
    }

    public function getFactTwo(): ?string
    {
        return $this->factTwo;
    }

    public function getFactThree(): ?string
    {
        return $this->factThree;
    }

    public function getBirthdate(): DateTime
    {
        return $this->birthdate;
    }

    // Setters
    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;
        return $this;
    }

    public function setMainCat(string $mainCat): self
    {
        $this->mainCat = $mainCat;
        return $this;
    }

    public function setSecondCat(?string $secondCat): self
    {
        $this->secondCat = $secondCat;
        return $this;
    }

    public function setThematic(string $thematic): self
    {
        $this->thematic = $thematic;
        return $this;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;
        return $this;
    }

    public function setPYoutube(?string $pYoutube): self
    {
        $this->pYoutube = $pYoutube;
        return $this;
    }

    public function setPTwitch(?string $pTwitch): self
    {
        $this->pTwitch = $pTwitch;
        return $this;
    }

    public function setPKick(?string $pKick): self
    {
        $this->pKick = $pKick;
        return $this;
    }

    public function setPTwitter(?string $pTwitter): self
    {
        $this->pTwitter = $pTwitter;
        return $this;
    }

    public function setPInstagram(?string $pInstagram): self
    {
        $this->pInstagram = $pInstagram;
        return $this;
    }

    public function setPTiktok(?string $pTiktok): self
    {
        $this->pTiktok = $pTiktok;
        return $this;
    }

    public function setFactOne(?string $factOne): self
    {
        $this->factOne = $factOne;
        return $this;
    }

    public function setFactTwo(?string $factTwo): self
    {
        $this->factTwo = $factTwo;
        return $this;
    }

    public function setFactThree(?string $factThree): self
    {
        $this->factThree = $factThree;
        return $this;
    }

    public function setBirthdate(DateTime $birthdate): self
    {
        $this->birthdate = $birthdate;
        return $this;
    }
}
