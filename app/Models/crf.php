<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class crf extends Model
{
    use HasFactory;

    protected $guarded=['q18'];

    public function consent(){
        return $this->belongsTo(consent::class);
    }

    /**
     * @return HasMany
     */
    public function insulines()
    {
        return $this->hasMany(insuline::class);
    }
}
