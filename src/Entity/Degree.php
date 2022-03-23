<?php

namespace App\Entity;

use App\Repository\DegreeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DegreeRepository::class)]
class Degree
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 120)]
    private $label;

    #[ORM\Column(type: 'integer')]
    private $RNCPLevel;

    #[ORM\OneToMany(mappedBy: 'degree', targetEntity: TrainingProgram::class)]
    private $trainingPrograms;

    public function __construct()
    {
        $this->trainingPrograms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getRNCPLevel(): ?int
    {
        return $this->RNCPLevel;
    }

    public function setRNCPLevel(int $RNCPLevel): self
    {
        $this->RNCPLevel = $RNCPLevel;

        return $this;
    }

    /**
     * @return Collection<int, TrainingProgram>
     */
    public function getTrainingPrograms(): Collection
    {
        return $this->trainingPrograms;
    }

    public function addTrainingProgram(TrainingProgram $trainingProgram): self
    {
        if (!$this->trainingPrograms->contains($trainingProgram)) {
            $this->trainingPrograms[] = $trainingProgram;
            $trainingProgram->setDegree($this);
        }

        return $this;
    }

    public function removeTrainingProgram(TrainingProgram $trainingProgram): self
    {
        if ($this->trainingPrograms->removeElement($trainingProgram)) {
            // set the owning side to null (unless already changed)
            if ($trainingProgram->getDegree() === $this) {
                $trainingProgram->setDegree(null);
            }
        }

        return $this;
    }
}
