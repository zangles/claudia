<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['patient_id','date','created_at','updated_at'];

    public function patient()
    {
        return $this->belongsTo(patient::class);
    }
}
