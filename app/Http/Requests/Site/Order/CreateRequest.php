<?php
namespace App\Http\Requests\Site\Order;

use App\Rules\Slug;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|string|max:64',
            'name' => 'string|max:64',
            'products_id' => 'required|array|min:1',
            'promocode' => 'nullable|string|max:64'
        ];
    }
}
