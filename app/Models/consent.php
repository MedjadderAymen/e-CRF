<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consent extends Model
{
    use HasFactory;

    protected $guarded=[

    ];

    public function dmPatient(){
        return $this->belongsTo(dmPatient::class);
    }

    public function crf(){
        return $this->hasOne(crf::class);
    }

}
