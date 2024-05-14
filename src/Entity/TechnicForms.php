<?php

namespace App\Entity;

use App\Repository\TechnicFormsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TechnicFormsRepository::class)]
class TechnicForms
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 15)]
    private ?string $technic_form_name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $technic_form_explanations = null;

    #[ORM\Column(length: 255)]
    private ?string $technic_form_image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTechnicFormName(): ?string
    {
        return $this->technic_form_name;
    }

    public function setTechnicFormName(string $technic_form_name): static
    {
        $this->technic_form_name = $technic_form_name;

        return $this;
    }

    public function getTechnicFormExplanations(): ?string
    {
        return $this->technic_form_explanations;
    }

    public function setTechnicFormExplanations(string $technic_form_explanations): static
    {
        $this->technic_form_explanations = $technic_form_explanations;

        return $this;
    }

    public function getTechnicFormImage(): ?string
    {
        return $this->technic_form_image;
    }

    public function setTechnicFormImage(string $technic_form_image): static
    {
        $this->technic_form_image = $technic_form_image;

        return $this;
    }
}
