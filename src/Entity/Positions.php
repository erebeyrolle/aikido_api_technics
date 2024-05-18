<?php

namespace App\Entity;

use App\Repository\PositionsRepository;
use Doctrine\DBAL\Types\Types;
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

    private ?string $working_shape = null;

    public function getWorkingShape(): ?string
    {
        return $this->working_shape;
    }

    public function setWorkingShape(string $working_shape): static
    {
        $this->working_shape = $working_shape;

        return $this;
    }

    #[ORM\Column(type: Types::TEXT)]

    private ?string $working_shape_explanations = null;

    public function getWorkingShapeExplanations(): ?string
    {
        return $this->working_shape_explanations;
    }

    public function setWorkingShapeExplanations(string $working_shape_explanations): static
    {
        $this->working_shape_explanations = $working_shape_explanations;

        return $this;
    }

    #[ORM\Column(length: 255)]

    private ?string $working_shape_image = null;

    public function getWorkingShapeImage()
    {
        return $this->working_shape_image;
    }

    public function setWorkingShapeImage(string $working_shape_image): static
    {
        $this->working_shape_image = $working_shape_image;

        return $this;
    }
}
