<?php

namespace App\Entity;

use App\Repository\AttacksRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttacksRepository::class)]
class Attacks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $attack_type = null;

    #[ORM\Column(length: 255)]
    private ?string $attack_type_explanations = null;

    #[ORM\Column(length: 255)]
    private ?string $attack_type_image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAttackType(): ?string
    {
        return $this->attack_type;
    }

    public function setAttackType(string $attack_type): static
    {
        $this->attack_type = $attack_type;

        return $this;
    }

    public function getAttackTypeExplanations(): ?string
    {
        return $this->attack_type_explanations;
    }

    public function setAttackTypeExplanations(string $attack_type_explanations): static
    {
        $this->attack_type_explanations = $attack_type_explanations;

        return $this;
    }

    public function getAttackTypeImage(): ?string
    {
        return $this->attack_type_image;
    }

    public function setAttackTypeImage(string $attack_type_image): static
    {
        $this->attack_type_image = $attack_type_image;

        return $this;
    }
}
