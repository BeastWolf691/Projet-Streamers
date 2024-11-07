<?php 
namespace App\Classes;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="UserCards")
 */
class UserCards
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="App\Classes\Users")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="App\Classes\Cards")
     * @ORM\JoinColumn(name="card_id", referencedColumnName="id")
     */
    private $card;

    public function __construct($user, $card)
    {
        $this->user = $user;
        $this->card = $card;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getCard()
    {
        return $this->card;
    }
}
