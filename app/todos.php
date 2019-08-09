<?php

namespace Tasks;

use Illuminate\Database\Eloquent\Model;

class todos extends Model
{

	    protected $guarded=[];


    public function tasks()    
    	{
    	
    	return $this->belongsTo(tasks::class); //eloquent model realtionship
   		 }
}
