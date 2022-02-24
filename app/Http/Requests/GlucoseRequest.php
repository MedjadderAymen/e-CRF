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

            "ysi_one_value" => [],
            "ysi_one_value_lot_a_gluco_a_bandelette" => [],
            "ysi_one_value_lot_a_gluco_a_bandelette_result" => [],
            "ysi_one_value_lot_a_gluco_b_bandelette" => [],
            "ysi_one_value_lot_a_gluco_b_bandelette_result" => [],

            "ysi_two_value_lot_b_gluco_a_bandelette" => [],
            "ysi_two_value_lot_b_gluco_a_bandelette_result" => [],
            "ysi_two_value_lot_b_gluco_b_bandelette" => [],
            "ysi_two_value_lot_b_gluco_b_bandelette_result" => [],

            "ysi_three_value_lot_c_gluco_a_bandelette" => [],
            "ysi_three_value_lot_c_gluco_a_bandelette_result" => [],
            "ysi_three_value_lot_c_gluco_b_bandelette" => [],
            "ysi_three_value_lot_c_gluco_b_bandelette_result" => [],

            "post_ysi_value" => [],

            //***************************************************************************************************

            "edited_sample_value" => [],
            "edited_sample_value_lot_a_gluco_a_bandelette" => [],
            "edited_sample_value_lot_a_gluco_a_bandelette_result" => [],
            "edited_sample_value_lot_a_gluco_b_bandelette" => [],
            "edited_sample_value_lot_a_gluco_b_bandelette_result" => [],

            "edited_sample_value_lot_b_gluco_a_bandelette" => [],
            "edited_sample_value_lot_b_gluco_a_bandelette_result" => [],
            "edited_sample_value_lot_b_gluco_b_bandelette" => [],
            "edited_sample_value_lot_b_gluco_b_bandelette_result" => [],

            "edited_sample_value_lot_c_gluco_a_bandelette" => [],
            "edited_sample_value_lot_c_gluco_a_bandelette_result" => [],
            "edited_sample_value_lot_c_gluco_b_bandelette" => [],
            "edited_sample_value_lot_c_gluco_b_bandelette_result" => [],

        ];
    }

    public function failedValidation(Validator $validator)
    {
        dd($validator->errors());
    }
}
