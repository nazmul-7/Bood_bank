<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function area(){
    	return $this->hasMany(Area::class);
    }

}
