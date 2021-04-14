<?php

namespace App\Http\Requests\Dish;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

use Auth;

class UpdateDishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vendor_id' => 'exists:App\Models\Vendor,id|nullable',
            'name'      => 'string|nullable',
            'photo'     => 'file|image|nullable',
            'price'     => 'string|nullable'
        ];
    }
}
