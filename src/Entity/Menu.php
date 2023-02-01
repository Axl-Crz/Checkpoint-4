<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $meal = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'menus')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Week $week = null;

    #[ORM\ManyToMany(targetEntity: Dishes::class, inversedBy: 'menus')]
    private Collection $dishes;

    public function __construct()
    {
        $this->dishes = new ArrayCollection();
    }

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

    public function getMeal(): ?string
    {
        return $this->meal;
    }

    public function setMeal(string $meal): self
    {
        $this->meal = $meal;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getWeek(): ?Week
    {
        return $this->week;
    }

    public function setWeek(?Week $week): self
    {
        $this->week = $week;

        return $this;
    }

    /**
     * @return Collection<int, Dishes>
     */
    public function getDishes(): Collection
    {
        return $this->dishes;
    }

    public function addDish(Dishes $dish): self
    {
        if (!$this->dishes->contains($dish)) {
            $this->dishes->add($dish);
        }

        return $this;
    }

    public function removeDish(Dishes $dish): self
    {
        $this->dishes->removeElement($dish);

        return $this;
    }
}
