<?php
namespace App\Http\Requests\Admin\Order;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|string|max:64',
            'name' => 'string|max:64',
            'products_id' => 'required|array|min:1',
            'status' => 'required|string|max:32',
        ];
    }
}
