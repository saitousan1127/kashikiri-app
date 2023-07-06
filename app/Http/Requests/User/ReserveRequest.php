<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            's-hour' => 'required',
            's-min' => 'required',
            'e-hour' => 'required',
            'e-min' => 'required'
        ];
    }
    public function s_hour(): string
    {
        return $this->input('s-hour');
    }
    public function s_min(): string
    {
        return $this->input('s-min');
    }
    public function e_hour(): string
    {
        return $this->input('e-hour');
    }
    public function e_min(): string
    {
        return $this->input('e-min');
    }
    public function userId(): int
    {
        return $this->user()->id;
    }
}
