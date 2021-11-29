<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class GlucoseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('glucose_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'strips' => ['required', 'string', 'in:Lot 1,Lot 2,Lot 3'],
            'glucometer' => ['required', 'string', 'in:Gluco A,Gluco B'],
            'solution_control_a' => ['required', 'string'],
            'solution_control_b' => ['required', 'string'],
            'analyse_date' => ['required', 'string'],
            'ysi_one_value_lot_one_gluco_a' => ['required', 'string'],
            'ysi_one_value_lot_one_gluco_b' => ['required', 'string'],
            'ysi_one_value_lot_two_gluco_a' => ['required', 'string'],
            'ysi_one_value_lot_two_gluco_b' => ['required', 'string'],
            'ysi_one_value_lot_three_gluco_a' => ['required', 'string'],
            'ysi_one_value_lot_three_gluco_b' => ['required', 'string'],
            'ysi_two_value_lot_one_gluco_a' => ['required', 'string'],
            'ysi_two_value_lot_two_gluco_a' => ['required', 'string'],
            'ysi_two_value_lot_three_gluco_a' => ['required', 'string'],
            'ysi_two_value_lot_one_gluco_b' => ['required', 'string'],
            'ysi_two_value_lot_two_gluco_b' => ['required', 'string'],
            'ysi_two_value_lot_three_gluco_b' => ['required', 'string'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        dd($validator->errors());
    }
}
