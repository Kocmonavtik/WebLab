<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReviewRepository::class)
 */
class Review
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reviews")
     * @ORM\JoinColumn(nullable=false)
     */
    private $emailUser;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="reviews")
     * @ORM\JoinColumn(nullable=false)
     */
    private $NameArticle;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $text;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmailUser(): ?User
    {
        return $this->emailUser;
    }

    public function setEmailUser(?User $emailUser): self
    {
        $this->emailUser = $emailUser;

        return $this;
    }

    public function getNameArticle(): ?Article
    {
        return $this->NameArticle;
    }

    public function setNameArticle(?Article $NameArticle): self
    {
        $this->NameArticle = $NameArticle;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

}
