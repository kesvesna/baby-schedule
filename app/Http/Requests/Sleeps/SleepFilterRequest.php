<?php

namespace App\Http\Requests\Sleeps;

use Illuminate\Foundation\Http\FormRequest;

class SleepFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'sleep_start_at' => '',
            'sleep_finish_at' => '',
            'date' => '',
        ];
    }
}
