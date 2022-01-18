<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    public $Id;

    #[ORM\Column(type: 'string', length: 255)]
    public $Nom;

    #[ORM\Column(type: 'string', length: 255)]
    public $Prenom;

    public function getId(): ?int
    {
        return $this->Id;
    }

    public function setId($id): self
    {
        $this->Id = $id;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function set($id, $nom, $prenom): self
    {
        $this->Id = $id;
        $this->Nom = $nom;
        $this->Prenom = $prenom;

        return ($this);
    }
}
