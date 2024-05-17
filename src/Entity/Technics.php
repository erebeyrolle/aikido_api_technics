<?php

namespace App\Entity;

use App\Repository\TechnicsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TechnicsRepository::class)]
class Technics
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $technic_name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $technic_explanations = null;

    #[ORM\Column(length: 255)]
    private ?string $technic_video_link = null;

    #[ORM\ManyToOne(inversedBy: 'technics')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TechnicForms $technic_form = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTechnicName(): ?string
    {
        return $this->technic_name;
    }

    public function setTechnicName(string $technic_name): static
    {
        $this->technic_name = $technic_name;

        return $this;
    }

    public function getTechnicExplanations(): ?string
    {
        return $this->technic_explanations;
    }

    public function setTechnicExplanations(string $technic_explanations): static
    {
        $this->technic_explanations = $technic_explanations;

        return $this;
    }

    public function getTechnicVideoLink(): ?string
    {
        return $this->technic_video_link;
    }

    public function setTechnicVideoLink(string $technic_video_link): static
    {
        $this->technic_video_link = $technic_video_link;

        return $this;
    }

    public function getTechnicForm(): ?TechnicForms
    {
        return $this->technic_form;
    }

    public function setTechnicForm(?TechnicForms $technic_form): static
    {
        $this->technic_form = $technic_form;

        return $this;
    }
}
