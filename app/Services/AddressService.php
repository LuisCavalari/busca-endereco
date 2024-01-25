<?php 
namespace App\Services;

use App\DTO\AddressDTO;
use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;

class AddressService implements AddressServiceInterface
{
    public function getAllAddresses(): Collection
    {
        return Address::all();
    }
   

    public function getAddressById(Address $address): Address
    {
        if (!$address) {
            throw new \Exception('Address not found');
        }

        return $address;
    }

    public function updateAddress(Address $address, array $updatedData): Address
    {
        try {
            
            $address->update($updatedData);
            return $address;
        } catch (\Exception $e) {
            throw new \Exception('An error occurred while updating the Address: ' . $e->getMessage());
        }
    }

    public function createAddress(AddressDTO $addressDTO): Address
    {
        $newAddress = Address::create([
            'street' => $addressDTO->getStreet(),
            'city' => $addressDTO->getCity(),
            'neighborhood' => $addressDTO->getNeighborhood(),
            'state' => $addressDTO->getState(),
            'country' => $addressDTO->getCountry(),
            'zip_code' => $addressDTO->getZipCode(),
        ]);

        return $newAddress;
    }

    public function deleteAddress(Address $address): void
    {
        $address->delete();
    }

    public function getAddressByZipCode(string $zipCode): ?Address 
    {
        return Address::where('zip_code', $zipCode)
            ->first();
    }
    
    public function fuzzySearch(string $searchTerm, int $perPage = 10)
    {
        return Address::where('street', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('city', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('neighborhood', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('state', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('country', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('zip_code', 'LIKE', '%' . $searchTerm . '%')
            ->paginate($perPage);
    }
}