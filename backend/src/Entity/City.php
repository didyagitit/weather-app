<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City implements \JsonSerializable
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $openweather_id;

    /**
    * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="cities")
    */
    private $users;

    /**
    * @ORM\OneToMany(targetEntity="App\Entity\Forecast", mappedBy="city")
    */
    private $forecasts;

    public function __construct()
    {
        $this->forecasts = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId()
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

    public function getOpenweatherId(): ?string
    {
        return $this->openweather_id;
    }

    public function setOpenweatherId(string $openweather_id): self
    {
        $this->openweather_id = $openweather_id;

        return $this;
    }

    public function getForecasts()
    {
        return $this->forecasts;
    }

    /**
    * @return Collection
    */
    public function users()
    {
        return $this->users;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'openweather_id' => $this->openweather_id
        ];
    }
}
