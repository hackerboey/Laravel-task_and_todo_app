@extends('layout')

@section('content')

		<h1 class="title">Create a new Task </h1>

		<form method="post" action="/tasks">
			{{ csrf_field()}} 	<!-- Special helper -->

			<div class="field">
				
				<label class="label" for=""> Title</label>
						<div class="control">

							<input type="text" name="task_name" class="input" placeholder="Enter A Task Name" required value="{{ old('task_name')}}">
						
						</div>
			</div>

			<div class="field">
				<label class="label" for=""> Description</label>

					<div class="control" >
			
						<textarea class="textarea" class="textarea" name="description" placeholder="Enter YOur task description here" required>{{ old('description')}}</textarea>
					</div>
			</div>

					<br>
			
				<div class="control">
				
					<button type="submit" class="button is-link">Create a new Task</button>
				</div>

				@include('errors')
		</form>
@endsection