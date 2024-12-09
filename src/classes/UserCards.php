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
     /**
     * Ajouter une liaison entre un utilisateur et une carte
     */
    public static function addLink($user, $card, $entityManager)
    {
        $link = new self($user, $card);
        $entityManager->persist($link);
        $entityManager->flush();
    }

    /**
     * Supprimer une liaison entre un utilisateur et une carte
     */
    public static function removeLink($user, $card, $entityManager)
    {
        $repository = $entityManager->getRepository(self::class);
        $link = $repository->findOneBy(['user' => $user, 'card' => $card]);

        if ($link) {
            $entityManager->remove($link);
            $entityManager->flush();
        }
    }
}

