<?php 
namespace App\DTO;
use Illuminate\Http\Request;

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

    public static function fromRequest(Request $request): AddressDTO
    {
        return new self(
            $request->input('street', ''),
            $request->input('city', ''),
            $request->input('neighborhood', ''),
            $request->input('state', ''),
            $request->input('country', ''),
            $request->input('zip_code', '')
        );
    }
}