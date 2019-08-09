@extends('layout')

@section('content')

	<h1 class="title">Edit Task</h1>

@if($task->completed==0)
<form method="post" action="/tasks/{{$task->id}}" style="margin-bottom: 1em">
	{{ method_field('PATCH') }}
	{{ csrf_field() }}
	<div class="field">
		<label class="label" for=""> Title</label>

		<div class="control">
			<input type="text" class="input" name="task_name" value="{{ $task->task_name}}" required>
		</div>

	</div>

	<div class="field">
		<label class="label" for=""> Description</label>

		<div class="control" >
			<textarea class="textarea" name="description" required>{{$task->description}}</textarea>
		</div>
	</div>

	<div class="control">
		<button type="submit" class="button is-link">Update</button>
	</div>

	
</form>

<form method="post" action="/tasks/{{$task->id}}">
	{{ method_field('DELETE') }}
	{{ csrf_field() }}

		<div class="field">

			<div class="control">
			
			<button type="submit" class="button">Delete</button>
		
			</div>
			
		</div>


</form>
@endif
@endsection