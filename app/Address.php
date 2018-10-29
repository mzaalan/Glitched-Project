<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'medschool',
        'gradyear',
        'speciality',
        'gender',
        'add1',
        'add2',
        'city',
        'state',
        'zip',
        'phone',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function confirm(){
        return $this->belongsTo('App\Models\ConfirmedUser');
    }
}
