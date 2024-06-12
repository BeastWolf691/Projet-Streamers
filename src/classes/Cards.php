<?php

namespace App\Classes;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
class Cards{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private int $id;

    #[ORM\Column()]
    private string $name;

    // plusieurs cartes peuvent concernées 1 createur
    // #[ORM\ManyToOne(targetEntity : Creator::class, inversedBy: 'cards')]
    // private Categories $creator;

    // 1 carte peu avoir plusieurs categories 
    #[ORM\OneToMany(targetEntity : Categories::class, mappedBy : 'cards')]
    private Collection $categories;

    // plujsieurs cartes peuvent avoir plusieurs categories ??????
    // #[ORM\ManyToMany(targetEntity : Services ::class, inversedBy : 'hotelList')]
    // #[JoinTable(name: 'service_hotel')]
    

    // Constructor
    public function __construct(string $name) {
        $this->name = $name;
     
      
    }

}