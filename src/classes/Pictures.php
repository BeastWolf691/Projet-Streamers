<?php

namespace App\Classes;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
class Picture{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private int $id;

    #[ORM\Column()]
    private string $name;

    #[ORM\Column()]
    private string $path;

    #[ORM\Column(type:'float')]//dimensions
    private float $sizeX;

    #[ORM\Column(type:'float')]//dimensions
    private float $sizeY;

    #[ORM\Column(type:'float')] //poids
    private float $sizeKo;

    #[ORM\Column()]
    private float $extend;

    // Constructor
    public function __construct(string $name,float $sizeX,float $sizeY,float $sizeKo,string $path,string $extend) {
        $this->name = $name;
        $this->sizeX = $sizeX;
        $this->sizeY = $sizeY;
        $this->sizeKo = $sizeKo;
        $this->path = $path;
        $this->extend = $extend;
        $this->name = $name;
     
      
    }
}