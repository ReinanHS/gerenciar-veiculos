<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'placa' => ['required', 'unique:vehicles,placa,'.$this->vehicle->placa.',placa', 'max:7', 'min:7'],
            'modelo' => ['required', 'max:100'],
            'marca' => ['required', 'max:100'],
            'status' => ['required', 'in:disponível,quebrado,manutenção'],
            'chassi' => ['required', 'unique:vehicles,chassi,'.$this->vehicle->chassi.',chassi', 'max:17', 'min:17'],
        ];
    }
}
