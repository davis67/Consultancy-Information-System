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
              <a class="btn btn-sm btn-gradient-danger mt-2" href="{{ route('opportunities.create') }}">+Create a Task </a>
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
							<td><i>finished</i></td>
							<td>
							<a href="{{ route('tasks.show', $task->id) }}" id="{{ $task->id }}" style="color: 000000;" class="view-task" data-toggle="modal" data-target="#taskModal"><i class="fa fa-eye text-dark" style="font-size: 20px;"></i></a>
							<a href="{{ route('tasks.update', $task->id) }}" id="{{ $task->id }}" class="edit-modal" data-toggle="modal" data-target="#UpdatetaskModal" style="color: 000000;"><i class="mdi mdi-file-check md-18 text-dark" style="font-size: 20px;"></i></a>
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

	 <-- View Modal -->
<div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taskModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="taskBody">
            	<div class="row">
            	<div class='col-md-6'>
               	<table class="table table-sm">
               		
               			<tr><td><strong>Task Name:</strong></td></td><td id="task_name"></td></tr>
               			<tr><td><strong>Task Priority</strong></td><td id="priority"></td></tr>
               			<tr><td><strong>Service Line</strong></td><td id="service_line"></td></tr>
               			<tr><td><strong>Start Date</strong></td><td id="start_date"></td></tr>
               			
               		
               	</table>
               </div>
               	<div class='col-md-6'>
               	<table class="table table-sm">
               		
               			<tr><td><b>Task Name:</b></td></td><td id="task_name"></td></tr>
               			<tr><td><strong>Task Status</strong></td><td id="task_status"></td></tr>
               			<tr><td>Name</td><td>Value</td></tr>
               			<tr><td>Myname</td><td>Myvalue</td></tr>
               			
               		
               	</table>
               </div>
                 </div>
               </v-container>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm btn-gradient-danger " data-dismiss="modal"><span aria-hidden="true">&times;</span> Close</button>
            </div>
        </div>
    </div>
</div>

<!--Edit Modal -->
<div class="modal fade" id="UpdatetaskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"  id="taskModalLabel">Update a Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="taskBody">
					<form action="{{route('tasks.update', $task->id)}}" method="post">
							@csrf
								<div class="form-row ">
								  <div class="form-group col-md-6">
									<label for="inputTask">Task Name</label>
									<input type="text" name="task_name" class="form-control {{ $errors->has('task_name') ? ' is-invalid' : '' }} form-control-sm" placeholder="Enter task name" value="{{ $task->task_name }}">
								  </div>
								  <div class="form-group col-md-6">
									<label for="inputState">Status</label>
									<select  class="form-control {{ $errors->has('task_status') ? 'is-invalid' : '' }} form-control-sm" name="task_status">
									  <option value="">Choose...</option>
									  @foreach(['Not started', 'In Progress', 'Completed', 'Pending input', 'Deffered'] as $item => $value)
									  <option value="{{$value}}">{{$value}}</option>
									  @endforeach
									</select>
								  </div>
								</div>
			
								<div class="form-row ">
										<div class="form-group col-md-6">
												<label for="inputState">Priority</label>
												<select id="inputState" name="priority" class="form-control {{ $errors->has('priority') ? ' is-invalid' : '' }}">
												  <option value="">Choose...</option>
												  <option value="High">High</option>
												  <option value="Medium">Medium</option>
												  <option value="Low">Low</option>
												</select>
											  </div>
											  <div class="form-group col-md-6">
													<label for="inputState">Service Line</label>
											<select id="inputState" name="service_line" class="form-control {{ $errors->has('service_line') ? ' is-invalid' : '' }} form-control-sm">
											   <option value="">Choose...</option>
											  @foreach(['Monitoring and Evaluation', 'Recruitment Services', 'HR Services', 'TCB Services', 'Outsourced Financial Services', 'ICT or MIS Services', 'Procurement Services', 'Public Sector Management Services', 'IS Audits', 'ACL', 'Enterprise Risk Management', 'Local Government', 'Management consultancy', 'Financial Advisory', 'Prequalification for Consultancy Services', 'Business Development', 'Infrastructure Consultancy', 'Service Activities(Indirect Services)'] as $item => $value)
											  <option value="{{$value}}">{{$value}}</option>
											  @endforeach
										  </select>
										 </div>
									 </div>   
								<div class="form-row">
								  <div class="form-group col-md-4">
									<label for="inputCity">Start Date</label>
									<input type="date" class="form-control {{ $errors->has('start_date') ? ' is-invalid' : '' }} form-control-sm" name="start_date">
									
								  </div>
								  <div class="form-group col-md-5">
										<label for="inputZip">End Date</label>
										<input type="date" name="end_date" class="form-control form-control-sm" id="end_date">
								  </div>
								  <div class="form-group col-md-3">
										<label for="inputTeam">Team </label>
										<select id="inputTeam" class="form-control {{ $errors->has('team') ? ' is-invalid' : '' }} form-control-sm" name="team">
											<option value="">Choose...</option>
											@foreach(['TSS', 'DCS', 'MCS', 'CSS', 'BDS', 'HTA', 'HCM', 'SPS', 'HillGroove'] as $value => $item)
											<option value="{{$item}}">{{$item}}</option>
											@endforeach
										  </select>     
								  </div>
								</div>
			
								<div class="form-row">
										<div class="form-group col-md-4">
										  <label for="inputCity">Start Time</label>
										  <input type="time" name="start_time" class="form-control form-control-sm" id="start_time">  
										</div>
										<div class="form-group col-md-4">
											  <label for="inputZip">End Time</label>
											  <input type="time" name="end_time" class="form-control form-control-sm" id="end_time">
										</div>
			
										<div class="form-group col-md-4">
											<label for="inputState">Related To:</label>
												<select  name="related_to" class="form-control {{ $errors->has('related_to') ? ' is-invalid' : '' }} form-control-sm">
												  <option value="">Choose...</option>
												  @foreach(['Bug', 'Case', 'Client', 'Contact', 'Lead', 'Opportunity','Project', 'project task', 'Target', 'Task'] as $value => $item)
												  <option id="related_to" value="{{$item}}">{{$item}}</option>
												  @endforeach
												</select>
											  </div>  
									  </div>
			
								<div class="form-group">
										<label for="description">Description:</label>
										<textarea class="form-control form-control-sm" name="description" rows="2" id="description" ></textarea>
								</div>
								<div class="form-group ">
									<label for="inputProject">Assigned To: </label>
									<input type="text" name="assigned_to" class="form-control form-control-sm" id="assigned_to">
								</div>
								<div class="pull-left">
								<button type="button" class="btn btn-outline-danger  btn-sm">Update a task</button>
								</div> 
								<div class="modal-footer">
										<button type="button" class="btn btn-outline-danger  btn-sm">Update a task</button>

										<button type="button" class="btn btn-danger btn-sm btn-gradient-danger " data-dismiss="modal"><span aria-hidden="true">&times;</span> Close</button>
									</div>
							  </form>
            
        </div>
    </div>
 </div>					 

		
</div>

@endSection
@section('script')
<script>
$('.view-task').click(function(event){
event.preventDefault();
let myurl = $(this).attr('id');
 //$('#taskModal').modal('show')
	$.ajax({
        type:"GET",
        url:"tasks/"+myurl,
        data:{task:myurl},
        //datatype:"json",
        success:function(data){
			$('#task_name').html(data.task_name);
            $('#task_status').html(data.task_status);
            $('#priority').html(data.priority);
            $('#service_line').html(data.service_line);
            $('#start_date').html(data.start_date);
            $('#end_date').html(data.end_date);
            $('#team').html(data.team);
            $('#start_time').html(data.start_time);
            $('#end_time').html(data.end_time);
            $('#related_to').html(data.related_to);
            $('#description').html(data.description);
            $('#assigned_to').html(data.assigned_to);						
        }


})
});

$('.edit-modal').click(function(event){
	event.preventDefault();
	let id = $(this).attr('id');
	let href = $(this).attr('href');
	console.log(href)
	$.ajax({
		type:'GET',
		url: href,
		data:{task:id},
		success:function(data){
			console.log(data);
			$('#task_name').html(data.task_name);
            $('#task_status').html(data.task_status);
            $('#priority').html(data.priority);
            $('#service_line').html(data.service_line);
            $('#start_date').html(data.start_date);
            $('#end_date').html(data.end_date);
            $('#team').html(data.team);
            $('#start_time').html(data.start_time);
            $('#end_time').html(data.end_time);
            $('#related_to').html(data.related_to);
            $('#description').html(data.description);
            $('#assigned_to').html(data.assigned_to);
		}
	})
})
</script>
@stop
