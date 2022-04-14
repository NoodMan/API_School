<?php

namespace App\Entity;

use App\Repository\GradeRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass: GradeRepository::class)]
#[ApiResource]
class Grade
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\Column(type: 'integer')]
    private $rating;

    #[ORM\ManyToOne(targetEntity: Students::class, inversedBy: 'grades')]
    #[ORM\JoinColumn(nullable: false)]
    private $student;

    #[ORM\ManyToOne(targetEntity: Lesson::class, inversedBy: 'grades')]
    #[ORM\JoinColumn(nullable: false)]
    private $lesson;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getStudent(): ?Students
    {
        return $this->student;
    }

    public function setStudent(?Students $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function getLesson(): ?Lesson
    {
        return $this->lesson;
    }

    public function setLesson(?Lesson $lesson): self
    {
        $this->lesson = $lesson;

        return $this;
    }
}
