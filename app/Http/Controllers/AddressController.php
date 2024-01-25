<?php

namespace App\Http\Controllers;

use App\DTO\AddressDTO;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Http\Requests\CreateAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Resources\AddressResource;
use App\Services\AddressService;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
    public function __construct(private AddressService $addressService) {}

    public function index(): JsonResponse
    {
        try {
            $allAddresses = $this->addressService->getAllAddresses();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'success' => true,
            'message' => 'Addresses listed',
            'data' => AddressResource::collection($allAddresses)
        ]);
    }

    public function update(Address $address, UpdateAddressRequest $request): JsonResponse
    {
        try {
            $addressDTO = $request->validated();

            $updatedAddress = $this->addressService->updateAddress($address, $addressDTO);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'success' => true,
            'message' => 'Address updated',
            'data' => new AddressResource($updatedAddress)
        ]);
    }

    public function show(Address $address): JsonResponse
    {
        try {
            $addressData = $this->addressService->getAddressById($address);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'message' => 'Addresses listed',
            'data' => new AddressResource($addressData)
        ]);
    }

    public function store(CreateAddressRequest $request): JsonResponse
    {
        $addressDTO = AddressDTO::fromRequest($request);

        try {
            $newAddress = $this->addressService->createAddress($addressDTO);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'success' => true,
            'message' => 'Address created',
            'data' => new AddressResource($newAddress)
        ]);
    }

    public function delete(Address $address): JsonResponse
    {
        try {
            $this->addressService->deleteAddress($address);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'success' => true,
            'message' => 'Address deleted',
        ]);
    }
}
