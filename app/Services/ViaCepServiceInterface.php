<?php 
namespace App\Services;

interface ViaCepServiceInterface
{
    public function getAddressByZipCode(string $zipcode);
}