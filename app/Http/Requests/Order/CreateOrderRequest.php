<?php

namespace App\Http\Requests\Order;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

use Auth;

class CreateOrderRequest extends FormRequest
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
            'dishes_id'         => 'exists:App\Models\Dishes,id|nullable',
            'special_request'   => 'string|nullable',
            'quantity'          => 'string|nullable',
            'created_at'        => 'date|nullable',
            'users'             => 'array|nullable',
            'dishes'            => 'array|nullable'
        ];
    }
}
