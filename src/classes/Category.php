<?php

namespace App\Classes;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Category
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private int $id;

    #[ORM\Column()]
    private string $name;

    #[ORM\Column()]
    private string $color;

    #[ORM\Column()]
    private string $icon;

    // Relation ManyToOne vers Cards
    #[ORM\ManyToOne(targetEntity: Cards::class, inversedBy: 'thematicValue')]
    #[ORM\JoinColumn(name: 'card_id', referencedColumnName: 'id', nullable: false)]
    private Cards $card;

    // Constructor
    public function __construct(string $name, string $color, string $icon, Cards $card)
{
    $this->name = $name;
    $this->color = $color;
    $this->icon = $icon;
    $this->card = $card;
}

    // Getters et setters
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getCard(): Cards
    {
        return $this->card;
    }

    public function setCard(Cards $card): self
    {
        $this->card = $card;
        return $this;
    }
}
