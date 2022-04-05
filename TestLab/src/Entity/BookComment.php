<?php

namespace App\Entity;

use App\Repository\BookCommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookCommentRepository::class)
 */
class BookComment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $NameBook;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $descriptionBook;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CreatorName;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $CommentText;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameBook(): ?string
    {
        return $this->NameBook;
    }

    public function setNameBook(string $NameBook): self
    {
        $this->NameBook = $NameBook;

        return $this;
    }

    public function getDescriptionBook(): ?string
    {
        return $this->descriptionBook;
    }

    public function setDescriptionBook(string $descriptionBook): self
    {
        $this->descriptionBook = $descriptionBook;

        return $this;
    }

    public function getCreatorName(): ?string
    {
        return $this->CreatorName;
    }

    public function setCreatorName(string $CreatorName): self
    {
        $this->CreatorName = $CreatorName;

        return $this;
    }

    public function getCommentText(): ?string
    {
        return $this->CommentText;
    }

    public function setCommentText(string $CommentText): self
    {
        $this->CommentText = $CommentText;

        return $this;
    }
}
