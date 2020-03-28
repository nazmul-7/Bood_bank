<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'area_id', 'address',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function area(){
        return $this->belongsTo(Area::class);
    }
}
