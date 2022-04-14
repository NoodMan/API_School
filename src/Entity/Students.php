<?php

namespace App\Entity;

use App\Repository\StudentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass: StudentsRepository::class)]
#[ApiResource]
class Students extends User
{
   
    #[ORM\Column(type: 'string', length: 255)]
    private $parent_email;

    #[ORM\Column(type: 'string', length: 50)]
    private $gender;

    #[ORM\OneToMany(mappedBy: 'student', targetEntity: Grade::class, orphanRemoval: true)]
    private $grades;

    public function __construct()
    {
        $this->grades = new ArrayCollection();
    } 

    public function getParentEmail(): ?string
    {
        return $this->parent_email;
    }

    public function setParentEmail(string $parent_email): self | Students
    {
        $this->parent_email = $parent_email;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return Collection<int, Grade>
     */
    public function getGrades(): Collection
    {
        return $this->grades;
    }

    public function addGrade(Grade $grade): self
    {
        if (!$this->grades->contains($grade)) {
            $this->grades[] = $grade;
            $grade->setStudent($this);
        }

        return $this;
    }

    public function removeGrade(Grade $grade): self
    {
        if ($this->grades->removeElement($grade)) {
            // set the owning side to null (unless already changed)
            if ($grade->getStudent() === $this) {
                $grade->setStudent(null);
            }
        }

        return $this;
    }
}
