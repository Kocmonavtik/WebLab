<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $emailUser;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $annotation;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $text;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $countVisit;

    /**
     * @ORM\Column(type="integer")
     */
    private $countReview;

    /**
     * @ORM\OneToMany(targetEntity=Review::class, mappedBy="NameArticle", orphanRemoval=true)
     */
    private $reviews;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
        $this->countVisit = 0;
        $this->countReview = 0;
        $this->date= new \DateTime(date('H:i:s Y-m-d'));
    }

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAnnotation(): ?string
    {
        return $this->annotation;
    }

    public function setAnnotation(string $annotation): self
    {
        $this->annotation = $annotation;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCountVisit(): ?int
    {
        return $this->countVisit;
    }

    public function setCountVisit(int $countVisit): self
    {
        $this->countVisit = $countVisit;

        return $this;
    }

    public function getCountReview(): ?int
    {
        return $this->countReview;
    }

    public function setCountReview(int $countReview): self
    {
        $this->countReview = $countReview;

        return $this;
    }

    /**
     * @return Collection|Review[]
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setNameArticle($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getNameArticle() === $this) {
                $review->setNameArticle(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->name;
    }
}
