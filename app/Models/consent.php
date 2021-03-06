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

    public function inclusion_exclusion(){
        return $this->hasOne(InclusionExclusion::class);
    }

    public function deviceLog(){
        return $this->hasOne(deviceLog::class);
    }

    public function controlSolution(){
        return $this->hasOne(controlSolution::class);
    }

    public function glucose(){
        return $this->hasOne(Glucose::class);
    }

}
