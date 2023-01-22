<?php

namespace App\Http\Requests\RecordActivities;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecordActivityFormRequest extends FormRequest
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
            'sleep_finish_at' => ['required', 'date', 'after_or_equal:' . date('Y-m-d')],
            'eat_finish_at' => ['required', 'date', 'after_or_equal:' . date('Y-m-d')],
            'walk_finish_at' => ['required', 'date', 'after_or_equal:' . date('Y-m-d')],
        ];
    }

}
