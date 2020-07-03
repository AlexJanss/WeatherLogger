<?php

namespace App\Entity;

use App\Repository\WeatherDataRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WeatherDataRepository::class)
 */
class WeatherData
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $temp_K;

    /**
     * @ORM\Column(type="integer")
     */
    private $humidity_percentage;

    /**
     * @ORM\Column(type="time")
     */
    private $time;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTempK(): ?float
    {
        return $this->temp_K;
    }

    public function setTempK(float $temp_K): self
    {
        $this->temp_K = $temp_K;

        return $this;
    }

    public function getHumidityPercentage(): ?int
    {
        return $this->humidity_percentage;
    }

    public function setHumidityPercentage(int $humidity_percentage): self
    {
        $this->humidity_percentage = $humidity_percentage;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
