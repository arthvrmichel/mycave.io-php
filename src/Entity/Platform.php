<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource]
class Platform
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Assert\NotBlank]
    #[Assert\Type('int')]
    private int $id;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Type('string')]
    private string $name;

    #[ORM\Column(length: 10)]
    #[Assert\NotBlank]
    #[Assert\Type('string')]
    private string $abbreviation;

    #[ORM\OneToMany(mappedBy: 'platform', targetEntity: Game::class)]
    private Collection $games;

    #[ORM\OneToMany(mappedBy: 'platform', targetEntity: Console::class)]
    private Collection $consoles;

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name):self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setAbbreviation(string $abbreviation): self
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    public function getAbbreviation(): string
    {
        return $this->abbreviation;
    }

    /**
     * @return Collection<int, Game>
     */
    public function getGames(): Collection
    {
        return $this->games;
    }

    /**
     * @return Collection<int, Console>
     */
    public function getConsoles(): Collection
    {
        return $this->consoles;
    }
}
