@extends('layouts.app')
@section('content')
          <div class="row">
          	<div class="col-lg-12 grid-margin stretch-card">
          	<div class="card animated shadow">
			
			<div class="card-body">
					<div class="card-title row">
							<div class="text col-md-4">
									Showing all Tasks
							</div>
						
						<div class=" col-md-8">
								<a href="{{ route('tasks.create') }}" style="float:right" class="btn btn-outline-danger btn-sm pull-right"><i class="fa fa-fw fa-reply-all"></i>Create a Task</a>
							</div>
						 </div>
				{{-- <table  class="table mdl-data-table example" >
					<thead>
						<tr>
							<th>Task Name</th>
							<th>Tasks Status</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Priority</th>
							<th>Team</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
							@foreach($tasks as $task)
							<tr>
							<td>{{$task->task_title}}</td>
							<td>{{$task->compl}}</td>
							<td>{{$task->start_date}}</td>
							<td>{{$task->end_date}}</td>
							<td>{{$task->priority}}</td>
							<td>{{$task->team}}</td>
							<td>
							<form action="{{ route('tasks.destroy', $task->id)}}" method="post">
									@csrf
								<input name="_method" type="hidden" value="DELETE">
								<div class="btn-group">
										<a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-outline-danger btn-xs"><i class="fa fa-eye"></i></a>
										<a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-outline-danger btn-xs"><i class="fa fa-edit"></i></a>
										<button type="submit" class="btn btn-outline-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
										</div>
							</form>
							</td>
							</tr>
							@endforeach
						
					</tbody>
				</table> --}}
				<table class="table table-striped example">
					<thead>
					  <tr>
						<th>Task Title</th>
						<th>Project Name</th>
						<th>Priority</th>
						<th>Status</th>
						<th>Sub Task</th>
						<th>Actions</th>
					  </tr>
					</thead>
				
					<tbody>
					@foreach ( $tasks as $task)
					  <tr>
						<td>{{ $task->task_title }} </td>
						<td>{{ $task->project->project_name }}</td>
						<td>
							@if ( $task->priority == 0 )
								<span class="label label-info">Normal</span>
							@else
								<span class="label label-danger">High</span>
							@endif
						</td>
						<td>
							@if ( !$task->completed )
								<a href="{{ route('task.completed', ['id' => $task->id]) }}" class="btn btn-outline-success btn-xs"> Mark as completed</a>
							@else
								<span class="label label-success text-success"><i class="fa fa-check"></i></span>
								<span class="label label-success text-success"><i class="fa fa-check"></i></span>
							@endif
						</td>
						<td>
							<a href="">
								<i class="mdi mdi-plus"></i>
							</a>
						</td>
						<td>
							<form action="{{ route('tasks.destroy', $task->id)}}" method="post">
									@csrf
								<input name="_method" type="hidden" value="DELETE">
								<div class="btn-group">
										<a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-outline-danger btn-xs"><i class="fa fa-eye"></i></a>
										<a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-outline-danger btn-xs"><i class="fa fa-edit"></i></a>
										<button type="submit" class="btn btn-outline-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
										</div>
							</form>
							</td>
					  </tr>
				
					@endforeach
					</tbody>
				
				</table>
				
			</div>
		</div>
	</div>
          	
	</div>

@endSection

