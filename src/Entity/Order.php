<?php

namespace App\Entity;

use App\Entity\Fabric;
use App\Entity\Pattern;
use App\Entity\Measurement;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\OrderRepository;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Pattern::class, inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pattern;

    /**
     * @ORM\ManyToOne(targetEntity=Fabric::class, inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fabric;

    /**
     * @ORM\OneToOne(targetEntity=Measurement::class, inversedBy="orders", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $measurements;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shippingAddress;

    /**
     * @ORM\Column(type="float")
     * @Assert\Positive
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=Status::class)
     */
    private $status;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPattern(): ?Pattern
    {
        return $this->pattern;
    }

    public function setPattern(?Pattern $pattern): self
    {
        $this->pattern = $pattern;

        return $this;
    }

    public function getFabric(): ?Fabric
    {
        return $this->fabric;
    }

    public function setFabric(?Fabric $fabric): self
    {
        $this->fabric = $fabric;

        return $this;
    }

    public function getMeasurements(): ?Measurement
    {
        return $this->measurements;
    }

    public function setMeasurements(Measurement $measurements): self
    {
        $this->measurements = $measurements;

        return $this;
    }

    public function getShippingAddress(): ?string
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress(?string $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

}
