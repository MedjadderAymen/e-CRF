<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glucose extends Model
{
    use HasFactory;

    protected $fillable=[
        'strips' ,
        'glucometer',
        'solution_control_a' ,
        'solution_control_b' ,
        'analyse_date' ,

        "ysi_one_value",
        "ysi_one_value_lot_a_gluco_a_bandelette",
        "ysi_one_value_lot_a_gluco_a_bandelette_result",
        "ysi_one_value_lot_a_gluco_b_bandelette",
        "ysi_one_value_lot_a_gluco_b_bandelette_result",

        "ysi_two_value",
        "ysi_two_value_lot_b_gluco_a_bandelette",
        "ysi_two_value_lot_b_gluco_a_bandelette_result",
        "ysi_two_value_lot_b_gluco_b_bandelette",
        "ysi_two_value_lot_b_gluco_b_bandelette_result",

        "ysi_three_value",
        "ysi_three_value_lot_c_gluco_a_bandelette",
        "ysi_three_value_lot_c_gluco_a_bandelette_result",
        "ysi_three_value_lot_c_gluco_b_bandelette",
        "ysi_three_value_lot_c_gluco_b_bandelette_result",

        "post_ysi_value",

        //******************************************************************************

        "edited_sample_value",

        "edited_sample_value_lot_a_gluco_a_bandelette",
        "edited_sample_value_lot_a_gluco_a_bandelette_result",
        "edited_sample_value_lot_a_gluco_b_bandelette",
        "edited_sample_value_lot_a_gluco_b_bandelette_result",

        "edited_sample_value_lot_b_gluco_a_bandelette",
        "edited_sample_value_lot_b_gluco_a_bandelette_result",
        "edited_sample_value_lot_b_gluco_b_bandelette",
        "edited_sample_value_lot_b_gluco_b_bandelette_result",

        "edited_sample_value_lot_c_gluco_a_bandelette",
        "edited_sample_value_lot_c_gluco_a_bandelette_result",
        "edited_sample_value_lot_c_gluco_b_bandelette",
        "edited_sample_value_lot_c_gluco_b_bandelette_result",

    ];

    public function consent(){
        return $this->belongsTo(consent::class);
    }
}
