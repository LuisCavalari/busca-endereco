<?php 
namespace App\DTO;
class AddressDTO
{
    public function __construct(
        private string $street,
        private string $city,
        private string $neighborhood, 
        private string $state,
        private string $country, 
        private string $zipCode
    ) {}

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getNeighborhood(): string
    {
        return $this->neighborhood;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }
}