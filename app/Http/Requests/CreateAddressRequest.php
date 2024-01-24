<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CreateAddressRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'street'       => 'required|max:255',
            'number'       => 'required|max:20',
            'neighborhood' => 'required|max:255',
            'city'         => 'required|max:255',
            'state'        => 'required|max:255',
            'country'      => 'required|max:255',
            'zip_code'     => 'required|max:11'
        ];
    }

    public function messages(): array
    {
        return [
            'street.required'       => 'Street name is required',
            'number.required'       => 'Number is required',
            'neighborhood.required' => 'Neighborhood name is required',
            'city.required'         => 'City name is required',
            'state.required'        => 'State name is required',
            'country.required'      => 'Country name is required',
            'zip_code.required'     => 'Zip code is required',
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
