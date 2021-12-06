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

            "ysi_one_value" => ['required', 'string'],
            "ysi_one_value_lot_a_gluco_a_bandelette" => ['required', 'string'],
            "ysi_one_value_lot_a_gluco_a_bandelette_result" => ['required', 'string'],
            "ysi_one_value_lot_a_gluco_b_bandelette" => ['required', 'string'],
            "ysi_one_value_lot_a_gluco_b_bandelette_result" => ['required', 'string'],

            "ysi_two_value" => ['required', 'string'],
            "ysi_two_value_lot_b_gluco_a_bandelette" => ['required', 'string'],
            "ysi_two_value_lot_b_gluco_a_bandelette_result" => ['required', 'string'],
            "ysi_two_value_lot_b_gluco_b_bandelette" => ['required', 'string'],
            "ysi_two_value_lot_b_gluco_b_bandelette_result" => ['required', 'string'],

            "ysi_three_value" => ['required', 'string'],
            "ysi_three_value_lot_c_gluco_a_bandelette" => ['required', 'string'],
            "ysi_three_value_lot_c_gluco_a_bandelette_result" => ['required', 'string'],
            "ysi_three_value_lot_c_gluco_b_bandelette" => ['required', 'string'],
            "ysi_three_value_lot_c_gluco_b_bandelette_result" => ['required', 'string'],

        ];
    }

    public function failedValidation(Validator $validator)
    {
        dd($validator->errors());
    }
}
