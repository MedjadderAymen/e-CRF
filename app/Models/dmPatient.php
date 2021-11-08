<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmPatient extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    protected $dates=[
        "signature_date"
    ];

    public function doctor()
    {

        return $this->belongsTo(doctor::class);

    }

    public function consent(){
        return $this->hasOne(consent::class);
    }

}
