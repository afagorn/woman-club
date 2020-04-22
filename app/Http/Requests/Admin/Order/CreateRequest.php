<?php
namespace App\Http\Requests\Admin\Order;

use App\Rules\Slug;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'string|max:64',
            'productId' => 'required|integer',
            'status' => 'required|string|max:32',
        ];
    }
}
