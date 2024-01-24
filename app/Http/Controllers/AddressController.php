<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Http\Requests\CreateAddressRequest;
use App\Http\Resources\AddressResource;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
    public function index(): JsonResponse
    {
        $allAddresses = Address::all();

        return response()->json([
            'success' => true,
            'message' => 'Addresses listed',
            'data' => AddressResource::collection($allAddresses)
        ]);
    }

    public function update(Address $address, Request $request): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => 'An error occurred while updating the Address',
            'error' => $e->getMessage(),
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Address $address): JsonResponse
    {
        if (! $address) {
            return response()->json([
                'success' => false,
                'message' => 'Address not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'message' => 'Addresses listed',
            'data' => new AddressResource($address)
        ]);
    }

    public function store(CreateAddressRequest $request): JsonResponse
    {
        $addressData = $request->all();
        $newAddress = Address::create($addressData);

        return response()->json([
                'success' => true,
                'message' => 'Address created',
                'data' => new AddressResource($newAddress)
            ]);
    }

    public function destroy(Address $address): JsonResponse
    {
        $address->delete();
        
        return response()->json([
                'success' => true,
                'message' => 'Address created',
                'data' => new AddressResource($newAddress)
            ]);
    }
}
