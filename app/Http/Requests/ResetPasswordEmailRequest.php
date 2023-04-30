<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email',  function ($attribute, $value, $fail) {
                if (!User::where('email', $value)->exists()) {
                    $fail(__('validation.custom.invalid_email', ['attribute' => __('validation.attributes.email')]));
                }
            },]
        ];
    }
}
