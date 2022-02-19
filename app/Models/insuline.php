<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class insuline extends Model
{
    use HasFactory;

    protected $fillable = [
        "dm_patient_id", "tag"
    ];


    /**
     * @return BelongsTo
     */
    public function crf()
    {

        return $this->belongsTo(crf::class);
    }

}
