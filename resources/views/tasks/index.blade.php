
@extends('layouts.app')

@section('content1')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 class="title">Tasks List (Click TO view)</h1>

		@foreach ($tasks as $task)
			<div class="control">

			<ul class="menu-list">

			<li>
                @if($task->completed==1)

                <a style="color: red" href="/tasks/{{ $task->id}}">{{ $task->task_name }}</li>
                 
                 
                 @elseif($task->completed==0)   
				<a href="/tasks/{{ $task->id}}">{{ $task->task_name }}</li>
				@endif
				</a>
			</ul>

			</div>
		@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection






