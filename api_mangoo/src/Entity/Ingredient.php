<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraint as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\IngredientRepository;
use Doctrine\ORM\Mapping as ORM;


// on met le validator pour s'assurer que tous les champs sont remplies


/**
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 */
class Ingredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @Groups("post=read")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post=read")
     * 
     */
    private $name;

    /**
     * @Groups("post=read")
     * @ORM\Column(type="integer")
     * 
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post=read")
     *
     */
    private $categorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
