<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientMeasure extends Model
{
    public function patient()
    {
        return $this->belongsTo(patient::class);
    }


}

