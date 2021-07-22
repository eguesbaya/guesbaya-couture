<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MeasurementRepository;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=MeasurementRepository::class)
 */
class Measurement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @ORM\Column(type="float", nullable=true)
    * @Assert\Positive
    */

    private $neck;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Positive
     */
    private $shoulderWidth;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Positive
     */
    private $bust;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Positive
     */
    private $waist;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Positive
     */
    private $rise;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Positive
     */
    private $hips;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Positive
     */
    private $thigh;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Positive
     */
    private $knee;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Positive
     */
    private $calf;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Positive
     */
    private $inseam;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Positive
     */
    private $outseam;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Positive
     */
    private $backLength;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Positive
     */
    private $sleeveLength;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNeck(): ?float
    {
        return $this->neck;
    }

    public function setNeck(float $neck): self
    {
        $this->neck = $neck;

        return $this;
    }

    public function getShoulderWidth(): ?float
    {
        return $this->shoulderWidth;
    }

    public function setShoulderWidth(?float $shoulderWidth): self
    {
        $this->shoulderWidth = $shoulderWidth;

        return $this;
    }

    public function getBust(): ?float
    {
        return $this->Bust;
    }

    public function setBust(?float $Bust): self
    {
        $this->Bust = $Bust;

        return $this;
    }

    public function getWaist(): ?float
    {
        return $this->waist;
    }

    public function setWaist(?float $waist): self
    {
        $this->waist = $waist;

        return $this;
    }

    public function getRise(): ?float
    {
        return $this->rise;
    }

    public function setRise(?float $rise): self
    {
        $this->rise = $rise;

        return $this;
    }

    public function getHips(): ?float
    {
        return $this->hips;
    }

    public function setHips(?float $hips): self
    {
        $this->hips = $hips;

        return $this;
    }

    public function getThigh(): ?float
    {
        return $this->thigh;
    }

    public function setThigh(?float $thigh): self
    {
        $this->thigh = $thigh;

        return $this;
    }

    public function getKnee(): ?float
    {
        return $this->knee;
    }

    public function setKnee(?float $knee): self
    {
        $this->knee = $knee;

        return $this;
    }

    public function getCalf(): ?float
    {
        return $this->calf;
    }

    public function setCalf(?float $calf): self
    {
        $this->calf = $calf;

        return $this;
    }

    public function getInseam(): ?float
    {
        return $this->inseam;
    }

    public function setInseam(?float $inseam): self
    {
        $this->inseam = $inseam;

        return $this;
    }

    public function getOutseam(): ?float
    {
        return $this->outseam;
    }

    public function setOutseam(?float $outseam): self
    {
        $this->outseam = $outseam;

        return $this;
    }

    public function getBackLength(): ?float
    {
        return $this->back_length;
    }

    public function setBackLength(?float $back_length): self
    {
        $this->back_length = $back_length;

        return $this;
    }

    public function getSleeveLength(): ?float
    {
        return $this->sleeveLength;
    }

    public function setSleeveLength(?float $sleeveLength): self
    {
        $this->sleeveLength = $sleeveLength;

        return $this;
    }
}
