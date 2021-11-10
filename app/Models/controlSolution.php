<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class controlSolution extends Model
{
    use HasFactory;

    protected $guarded=[

    ];

    public function consent(){
        return $this->belongsTo(consent::class);
    }

}
