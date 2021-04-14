<?php

namespace App\Http\Requests\Vendor;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

use Auth;

class UpdateVendorRequest extends FormRequest
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
            'name'                      => 'string|nullable|max:128',
            'logo'                      => 'file|image|nullable',
            'updated_at'                => 'date|nullable',
            'tags'                      => 'array|nullable',
            'dishes'                    => 'array|nullable'
        ];
    }
}
