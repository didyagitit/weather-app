<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ForecastRepository")
 */
class Forecast
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $temperature;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $humidity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $icon;

    /**
     * @ORM\Column(type="datetime")
     */
    private $weather_datetime;

    /**
    * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="forecasts")
    * @ORM\JoinColumn()
    */
    private $city;

    public function getCity()
    {
      return $this->city;
    }

    public function setCity($city): void
    {
      $this->city = $city;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTemperature(): ?string
    {
        return $this->temperature;
    }

    public function setTemperature(string $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getHumidity(): ?string
    {
        return $this->humidity;
    }

    public function setHumidity(string $humidity): self
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getWeatherDatetime(): ?\DateTimeInterface
    {
        return $this->weather_datetime;
    }

    public function setWeatherDatetime(\DateTimeInterface $weather_datetime): self
    {
        $this->weather_datetime = $weather_datetime;

        return $this;
    }
}
