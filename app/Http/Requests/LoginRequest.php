<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', function ($attribute, $value, $fail) {
                $user = User::where('email', $value)->orWhere('username', $value)->first();
                if (!$user) {
                    return $fail('The ' . $attribute . ' is invalid.');
                }
            }],
            'password' => ['required']
        ];
    }
}
