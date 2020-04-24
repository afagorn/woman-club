<?php
namespace App\Http\Requests\Admin\User\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'string|max:64',
            'name' => 'string|max:64',
            'password' => 'nullable|string|max:32',
            'tgUsername' => 'string|max:24',
            'unsubscribeDate' => 'date',
            //'status' => 'required|string|max:32',
        ];
    }
}
