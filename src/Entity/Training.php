<?php

namespace App\Entity;

use App\Repository\TrainingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrainingRepository::class)]
class Training
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $startDate;

    #[ORM\Column(type: 'datetime')]
    private $endDate;

    #[ORM\ManyToOne(targetEntity: TrainingProgram::class, inversedBy: 'trainings')]
    private $trainingProgram;

    #[ORM\ManyToOne(targetEntity: TrainingCenter::class, inversedBy: 'trainings')]
    private $trainingCenter;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getTrainingProgram(): ?TrainingProgram
    {
        return $this->trainingProgram;
    }

    public function setTrainingProgram(?TrainingProgram $trainingProgram): self
    {
        $this->trainingProgram = $trainingProgram;

        return $this;
    }

    public function getTrainingCenter(): ?TrainingCenter
    {
        return $this->trainingCenter;
    }

    public function setTrainingCenter(?TrainingCenter $trainingCenter): self
    {
        $this->trainingCenter = $trainingCenter;

        return $this;
    }
}
