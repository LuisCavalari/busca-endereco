<?php

namespace App\Http\Controllers;

use App\Services\AddressService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AddressFuzzySearchController extends Controller
{
    public function __construct(private AddressService $addressService) {}

    public function __invoke(Request $request): JsonResponse
    {
        try {
            $searchTerm = $request->query('search_term');
            $perPage = $request->query('per_page', 10);

            $results = $this->addressService->fuzzySearch($searchTerm, $perPage);

            $data = $results->items();

            $paginationData = [
                'current_page' => $results->currentPage(),
                'per_page' => $results->perPage(),
                'total' => $results->total(),
            ];

            return response()->json([
                'success' => true,
                'message' => 'Fuzzy search results',
                'data' => $data,
                'pagination' => $paginationData,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
