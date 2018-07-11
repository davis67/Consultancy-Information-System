@extends('layouts.app')
@section('content')
        <div class="page-header ">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tasks</a></li>
                <li class="breadcrumb-item active" aria-current="page">View All Tasks</li>
              </ol>
            </nav>
            <h3 class="page-title">
             {{--  <span class="page-title-icon bg-gradient-danger text-white mr-2">
                <i class="mdi mdi-folder-outline"></i>                 
              </span> --}}
              <a class="btn btn-sm btn-gradient-danger mt-2" href="{{ route('tasks.create') }}">+Create a Task </a>
            </h3>
          </div>
          <div class="row">
          	<div class="col-lg-12 grid-margin stretch-card">
          	<div class="card animated shadow">
			
			<div class="card-body">
				<div class="card-title">
				Showing all Tasks
			   </div>
				<table  class="table mdl-data-table example" >
					<thead>
						<tr>
							<th>Task Name</th>
							<th>Tasks Status</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Priority</th>
							<th>Team</th>
							<th>Assigned To</th>
							<th>Mark Finished</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
							@foreach($tasks as $task)
							<tr>
							<td>{{$task->task_name}}</td>
							<td>{{$task->task_status}}</td>
							<td>{{$task->start_date}}</td>
							<td>{{$task->end_date}}</td>
							<td>{{$task->priority}}</td>
							<td>{{$task->team}}</td>
							<td>{{$task->assigned_to}}</td>
							<td><i>Completed</i></td>
							<td>
							<a href="{{ route('tasks.show', $task->id) }}"style="color: 000000;" class="view-task"><i class="fa fa-eye text-dark" style="font-size: 20px;"></i></a>
							<a href="{{ route('tasks.edit', $task->id) }}" style="color: 000000;"><i class="mdi mdi-file-check md-18 text-dark" style="font-size: 20px;"></i></a>
							<a href="" style="color: 000000;"><i class="mdi mdi-delete text-dark" style="font-size: 20px;"></i></a
							</div>
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

