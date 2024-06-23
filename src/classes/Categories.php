<?php

namespace App\Classes;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
class Categories{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private int $id;

    #[ORM\Column()]
    private string $name;

    // #[ORM\Column()]
    // private string $color;

    #[ORM\Column()]
    private string $icon;

    
    // Constructor
    public function __construct(string $name) {
        $this->name = $name;
     
      
    }
}