<?php

namespace App\Entity;

use App\Repository\TypeContactRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeContactRepository::class)]
class TypeContact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getIdTypecontact(): ?int
    {
        return $this->id;
    }
}
