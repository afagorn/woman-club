<?php
namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2048',
        ];
    }
}
