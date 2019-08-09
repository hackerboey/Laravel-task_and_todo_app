<?php

namespace Tasks\Http\Controllers;

use Illuminate\Http\Request;
use Tasks\todos;
use Tasks\tasks;

class TasksTodoController extends Controller
{

	 public function store(Tasks $tasks)
    {

    	request()->validate(['description'=>'required']);

    	todos::create([ #todos is the model name; create is a function
    		'tasks_id' => request('todo_id'),
    		'description' => request('description')

    	]);
    		
    	return back();
    }



    public function update(todos $todo)
    {
    	$todo->update([

    		'completed'=>Request()->has('completed') /*update the field in the database after checking wether request has keyword "completed" or not*/
    	]);

    	return back();
    }

   
}