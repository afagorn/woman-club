<?php
namespace App\Http\Requests\Admin\Products;

use App\Rules\Slug;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2048',
            'cost' => 'required|integer',
            'invite_link' => 'required|string',
            'slug' => ['unique:products,slug', new Slug()]
        ];
    }
}
