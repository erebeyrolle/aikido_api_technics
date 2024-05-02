<?php

namespace App\Entity;

use App\Repository\PositionsRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: PositionsRepository::class)]

class Positions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    #[ORM\Column(length: 50)]
    
    private ?string $working_shape=null;

    public function getWorkingShape(): ?string
    {
        return $this->working_shape;
    }

    public function setWorkingShape(string $working_shape): self
    {
        $this->working_shape = $working_shape;

        return $this;
    }

    #[ORM\Column(length: 255)]
    
    private ?string $explanation_working_shape=null;

    public function getExplanationWorkingShape(): ?string
    {
        return $this->explanation_working_shape;
    }

    public function setExplanationWorkingShape(string $explanation_working_shape): self
    {
        $this->explanation_working_shape = $explanation_working_shape;

        return $this;
    }
}
