@extends('layout')

@section('content')

	<h1 class="title">{{ $task->task_name }}</h1>

	<div class="box">
		<label class="label" for="description">Task Description</label>

		{{ $task->description}}
		@if($task->completed==0)
		<p>
		
		<a href="/tasks/{{$task->id}}/edit">Edit</a>
		@endif
		</p>
		<p>
			<form method="post" action="/tasks/{{ $task->id }}/completed">
					@method('PATCH') <!-- or we can user {{ method_field('PATCH') }} -->
					@csrf

					<label class="checkbox {{ $task->completed ? 'is-checked' :''}}" for="completed" >

						<input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' :''}}>

						Completed

					</label>

				</form>
		</p>
	</div>


	

	@if($task->todos->count())
		
		<div class="box">
			<label class="label" for="todos">Todos For this task:</label>
			@foreach($task->todos as $todo)
		

			<div>
				<form method="post" action="/todos/{{ $todo->id }}">
					@method('PATCH') <!-- or we can user {{ method_field('PATCH') }} -->
					@csrf

					<label class="checkbox {{ $todo->completed ? 'is-checked' :''}}" for="completed" >

						<input type="checkbox" name="completed" onchange="this.form.submit()" {{ $todo->completed ? 'checked' :''}}>

						{{ $todo->description }}

					</label>

				</form>
						
			</div>
		
			@endforeach

		</div>

	@endif
	

	<!-- add a new todo -->
@if($task->completed==0)
	<form class="box" method="post" action="/tasks/{{$task->id}}/todos/">
		@csrf
		
		<input type=text name=todo_id value="{{ $task->id }}" readonly hidden required>
		<div class="field">
			<label class="label" for="description">Add Todo for this task</label>

			<div class="control">
				<input type="text" class="input" name="description" placeholder="New Todo" required>
			</div>
		</div>
		
		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">Add todo</button>
			</div>
		</div>
		
		@include('errors')
	</form>
	@endif
@endsection