<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class membership extends Model
{
    protected $fillable = [
        'id',
        'name',
        'user_id',
        'stripe_id',
        'stripe_plan',
        'ends_at',
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
