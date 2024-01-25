<?php

namespace App\Http\Controllers;

use App\Services\AddressService;
use App\Services\ViaCepService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SearchByZipCodeController extends Controller
{
    public function __construct(private AddressService $addressService, private ViaCepService $viaCepService) {}
    
    public function __invoke(string $zipCode): JsonResponse
    {
        try {
            $address = $this->addressService->getAddressByZipCode($zipCode);

            if (! $address) {
                $externalServiceAddress = $this->viaCepService->getAddressByZipCode($zipCode);
                if (! $externalServiceAddress) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Address not found',
                    ], Response::HTTP_NOT_FOUND);
                }
                $address = $this->addressService->createAddress($externalServiceAddress);
            }

            return response()->json([
                'success' => true,
                'message' => 'Address found',
                'data' => $address,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
