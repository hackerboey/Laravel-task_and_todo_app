<?php

namespace Tasks;

use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    protected $guarded=[];


   public function todos()
{
	return $this->hasMany(todos::class); //eloquent model realtionship
}
}


