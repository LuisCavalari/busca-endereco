<?php 
namespace App\Services;

use App\DTO\AddressDTO;
use App\Models\Address;

interface AddressServiceInterface
{
    public function getAllAddresses();

    public function updateAddress(Address $address, array $updatedData);

    public function getAddressById(Address $address);

    public function createAddress(AddressDTO $addressData);

    public function deleteAddress(Address $address);
}