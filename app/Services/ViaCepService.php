<?php 
namespace App\Services;

use App\DTO\AddressDTO;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;



class ViaCepService implements ViaCepServiceInterface
{
    private $httpClient;
    public function __construct()
    {
        $this->httpClient = Http::withOptions([
            'base_uri' => env('VIA_CEP_URL')
        ]);
    }
    public function getAddressByZipCode(string $zipCode): ?AddressDTO
    {
        $response = $this->httpClient->get("{$zipCode}/json/")->json();
        if (! $response || Arr::get($response, 'erro'))
            return null;
        return new AddressDTO(
            street: Arr::get($response, 'logradouro'),
            city: Arr::get($response, 'localidade'),
            neighborhood: Arr::get($response, 'bairro'),
            state: Arr::get($response, 'uf'),
            country: 'BR',
            zipCode: $this->removeDashFromZipCode(Arr::get($response, 'cep'))
        );
    }

    private function removeDashFromZipCode(string $zipCode) 
    {
        return str_replace('-', '', $zipCode);
    }
}