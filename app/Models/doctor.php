<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dmPatients(){
        return $this->hasMany(dmPatient::class);
    }

}
