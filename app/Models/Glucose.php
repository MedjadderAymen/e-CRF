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
        'ysi_one_value_lot_one_gluco_a' ,
        'ysi_one_value_lot_one_gluco_b' ,
        'ysi_one_value_lot_two_gluco_a' ,
        'ysi_one_value_lot_two_gluco_b' ,
        'ysi_one_value_lot_three_gluco_a' ,
        'ysi_one_value_lot_three_gluco_b' ,
        'ysi_two_value_lot_one_gluco_a' ,
        'ysi_two_value_lot_two_gluco_a' ,
        'ysi_two_value_lot_three_gluco_a' ,
        'ysi_two_value_lot_one_gluco_b' ,
        'ysi_two_value_lot_two_gluco_b' ,
        'ysi_two_value_lot_three_gluco_b' ,
    ];

    public function consent(){
        return $this->belongsTo(consent::class);
    }
}
