<?php
namespace App\Classes;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private int $id;
    #[ORM\Column()]
    private string $nickname;
    #[ORM\Column()]
    private string $mail;
    #[ORM\Column()]
    private string $subject;
    #[ORM\Column()]
    private string $feedback;
    

    public function __construct(
        string $nickname,
        string $mail,
        string $subject,
        string $feedback,

    ) {
        $this->nickname = $nickname;
        $this->mail = $mail;
        $this->subject = $subject;
        $this->feedback = $feedback;
    }
}