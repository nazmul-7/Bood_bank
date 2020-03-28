<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function district(){
    	return $this->belongsTo(District::class);
    }

    public function address(){
        return $this->belongsTo(Address::class);
    }
}
