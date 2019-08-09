<?php

namespace Tasks\Http\Controllers;

use Illuminate\Http\Request;

use Tasks\tasks;

class TasksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {



    	$tasks=tasks::where('owner_id',auth()->id())->get(); #it loads all the tasks (its an eloquent)

    	



    	return view('tasks.index',compact('tasks')); #passing variable or the tasks to the tasks index view 


    }


    public function new()
    {
    	

    	return view('tasks.new'); #returning a new task page 

    }

    public function view($id)
    {
        
    		$task=tasks::findOrFail($id);

            if ($task->owner_id!==auth()->id()) {
            abort(403);
                 }

    		return view('tasks.view',compact('task'));
    	
    }

    public function edit($id)
    {
    	
    	$task=tasks::findOrFail($id);
        if ($task->owner_id!==auth()->id()) {
            abort(403);
                 }

    	return view('tasks.edit',compact('task'));	

    }

    public function update($id)
    {
    	$task=tasks::findOrFail($id);
        if ($task->owner_id!==auth()->id()) {
            abort(403);
                 }
    	$task->task_name=request('task_name');
    	$task->description=request('description');
    	$task->save();

    	return redirect('/tasks');
    }

    public function destroy($id)            
    {
    	tasks::findOrFail($id)->delete();
    	return redirect('/tasks');

    }



    public function save()
    {

    	$attributes=request()->validate([

    		'task_name' => 'required',
    		'description' => 'required',
    		
    	]);

        $attributes['owner_id']=auth()->id();


    	tasks::create($attributes);
        /*tasks::create(request(['task_name','description','owner_id']));*/



   /* 	tasks::create([

    		'task_name' => request('task_name'),
    		'description' => request('description'),
    		'username' => request('username')
    	]);*/

    	// $tasks=new tasks();

    	// $tasks->task_name=request('task_name');
    	// $tasks->description=request('description');
    	// $tasks->username=request('username');
    	// $tasks->save();

    	#return requests()->all(); #return all the submitted data 
    	return redirect('/tasks');
    }



    public function completed($id)
    {   
        $task=tasks::findOrFail($id);

        $task->update([

            'completed'=>Request()->has('completed') /*update the field in the database after checking wether request has keyword "completed" or not*/
        ]);




        return back();

       

        
    }
}


