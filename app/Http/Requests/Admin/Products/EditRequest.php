<?php
namespace App\Http\Requests\Admin\Products;

use App\Rules\Slug;
use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2048',
            'cost' => 'required|integer',
            'slug' => ['required', 'unique:products,slug,'. $this->product->id, new Slug()]
        ];
    }
}
