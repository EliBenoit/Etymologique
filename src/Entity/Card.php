<?php

namespace App\Entity;

use App\Repository\CardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CardRepository::class)
 */
class Card
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Description::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $descriptionId;

    /**
     * @ORM\ManyToOne(targetEntity=Name::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $nameId;

    /**
     * @ORM\ManyToOne(targetEntity=Image::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $imageId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptionId(): ?Description
    {
        return $this->descriptionId;
    }

    public function setDescriptionId(?Description $descriptionId): self
    {
        $this->descriptionId = $descriptionId;

        return $this;
    }

    public function getNameId(): ?Name
    {
        return $this->nameId;
    }

    public function setNameId(?Name $nameId): self
    {
        $this->nameId = $nameId;

        return $this;
    }

    public function getImageId(): ?Image
    {
        return $this->imageId;
    }

    public function setImageId(?Image $imageId): self
    {
        $this->imageId = $imageId;

        return $this;
    }
}
