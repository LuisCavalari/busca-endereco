<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateAddressRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'street'       => 'max:255',
            'number'       => 'max:20',
            'neighborhood' => 'max:255',
            'city'         => 'max:255',
            'state'        => 'max:255',
            'country'      => 'max:255',
            'zip_code'     => 'max:11'
        ];
    }

    public function messages(): array
    {
        return [
            'street.max'            => 'Street name cannot exceed 255 characters',
            'number.max'            => 'Number name cannot exceed 10 characters',
            'neighborhood.max'      => 'Neighborhood name cannot exceed 255 characters',
            'city.max'              => 'City name cannot exceed 255 characters',
            'state.max'             => 'State name cannot exceed 255 characters',
            'country.max'           => 'Country name cannot exceed 255 characters',
            'zip_code.max'          => 'Zip code cannot exceed 11 characters'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
