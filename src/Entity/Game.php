<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource]
class Game
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

    #[ORM\ManyToOne(inversedBy: 'games')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    #[Assert\Type(Platform::class)]
    private Platform $platform;

    #[ORM\ManyToOne(inversedBy: 'games')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    #[Assert\Type(Edition::class)]
    private Edition $edition;

    #[ORM\ManyToOne(inversedBy: 'games')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    #[Assert\Type(Version::class)]
    private Version $version;

    #[ORM\Column]
    #[Assert\Type('DateTimeInterface')]
    private ?DateTimeInterface $releaseDate = null;

    #[ORM\ManyToOne(inversedBy: 'games')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    #[Assert\Type(PreservationState::class)]
    private PreservationState $preservationState;

    #[ORM\Column]
    #[Assert\Type('int')]
    private ?int $buyingPrice = null;

    #[ORM\Column]
    #[Assert\Type('DateTimeInterface')]
    private ?DateTimeInterface $buyingDate = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setPlatform(Platform $platform): self
    {
        $this->platform = $platform;

        return $this;
    }

    public function getPlatform(): Platform
    {
        return $this->platform;
    }

    public function setEdition(Edition $edition): self
    {
        $this->edition = $edition;

        return $this;
    }

    public function getEdition(): Edition
    {
        return $this->edition;
    }

    public function setVersion(Version $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getVersion(): Version
    {
        return $this->version;
    }

    public function setReleaseDate(?DateTimeInterface $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getReleaseDate(): ?DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setPreservationState(PreservationState $preservationState): self
    {
        $this->preservationState = $preservationState;

        return $this;
    }

    public function getPreservationState(): PreservationState
    {
        return $this->preservationState;
    }

    public function setBuyingPrice(?int $buyingPrice): self
    {
        $this->buyingPrice = $buyingPrice;

        return $this;
    }

    public function getBuyingPrice(): ?int
    {
        return $this->buyingPrice;
    }

    public function setBuyingDate(?DateTimeInterface $buyingDate): self
    {
        $this->buyingDate = $buyingDate;

        return $this;
    }

    public function getBuyingDate(): ?DateTimeInterface
    {
        return $this->buyingDate;
    }
}
