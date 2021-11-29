<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glucose extends Model
{
    use HasFactory;

    protected $fillable=[
        "strips","glucometer","solution_control_a","solution_control_b","analyse_date","ysi_one_value", "ysi_two_value", "consent_id"
    ];

    public function consent(){
        return $this->belongsTo(consent::class);
    }
}
