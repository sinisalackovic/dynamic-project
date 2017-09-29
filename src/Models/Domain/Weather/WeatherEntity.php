<?php

namespace Model\Domain\Weather;

class WeatherEntity
{
    private $temp;
    private $city;
    private $country;

    public function __construct($temp)
    {
        $this->temp  = $temp;
    }

    public function getTemp()
    {
        return $this->temp;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }
}