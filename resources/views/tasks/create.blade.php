@extends('layouts.app')

@push("head")
<script>
  window.APP_USERS={!! $users->toJson() !!}
</script>
@endpush
@section('content')
	 	<div class="card">
         <div class="card-body">
           <h2 class="card-title">Create Tasks</h2>
            <form action="{{route('tasks.store')}}" method="post">
            	@csrf
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <label for="inputTask">Task Name</label>
                        <input type="text" name="task_name" class="form-control {{ $errors->has('task_name') ? ' is-invalid' : '' }} form-control-sm" placeholder="Enter task name">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputState">Status</label>
                        <select  class="form-control {{ $errors->has('task_status') ? 'is-invalid' : '' }} form-control-sm" name="task_status">
                          <option value="">Choose...</option>
                          @foreach(['Not started', 'In Progress', 'Completed', 'Pending input', 'Deffered'] as $item => $value)
                          <option value="{{$item}}">{{$value}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-row ">
                            <div class="form-group col-md-6">
                                    <label for="inputState">Priority</label>
                                    <select id="inputState" name="priority" class="form-control {{ $errors->has('priority') ? ' is-invalid' : '' }}">
                                      <option value="">Choose...</option>
                                      <option value="1">High</option>
                                      <option value="2">Medium</option>
                                      <option value="3">Low</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-6">
                                        <label for="inputState">Service Line</label>
                                <select id="inputState" name="service_line" class="form-control {{ $errors->has('service_line') ? ' is-invalid' : '' }} form-control-sm">
                                   <option value="">Choose...</option>
		                          @foreach(App\Task::serviceLines() as $item => $value)
                                  <option value="{{$item}}">{{$value}}</option>
		                          @endforeach
		                      </select>
                             </div>
                         </div>   
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="inputCity">Start Date</label>
                        <input type="date" class="form-control {{ $errors->has('start_date') ? ' is-invalid' : '' }} form-control-sm" name="start_date" id="inputCity">
                        
                      </div>
                      <div class="form-group col-md-3">
                            <label for="inputZip">End Date</label>
                            <input type="date" name="end_date" class="form-control {{ $errors->has('end_time') ? ' is-invalid' : '' }} form-control-sm" id="inputZip">
                      </div>
                      <div class="form-group col-md-6">
                            <label for="inputTeam">Team </label>
                            <select id="inputTeam" onchange="getValue()" class="form-control {{ $errors->has('team') ? ' is-invalid' : '' }} form-control-sm" name="team">
                                <option value="">Choose...</option>
<<<<<<< HEAD
                                @foreach(['TCS', 'DCS', 'MCS', 'CSS', 'BDS', 'HTA', 'HCM', 'SPS', 'HillGroove'] as $value => $item)
                                <option value="{{$item}}">{{$item}}</option>
=======
                                @foreach(App\Team::names() as  $team)
                                <option value="{{$team}}">{{$team}}</option>
>>>>>>> cce04fbecf75b8dd3e823514ab87bda49f173d56
                                @endforeach
                              </select>     
                      </div>
                    </div>

                    <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="inputCity">Start Time</label>
                              <input type="time" name="start_time" class="form-control {{ $errors->has('start_time') ? ' is-invalid' : '' }} form-control-sm" id="inputCity">  
                            </div>
                            <div class="form-group col-md-3">
                                  <label for="inputZip">End Time</label>
                                  <input type="time" name="end_time" class="form-control {{ $errors->has('end_time') ? ' is-invalid' : '' }} form-control-sm" id="inputZip">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputState">Related To:</label>
                                    <select id="inputState" name="related_to" class="form-control {{ $errors->has('related_to') ? ' is-invalid' : '' }} form-control-sm">
                                      <option value="">Choose...</option>
                                      @foreach(['Bug', 'Case', 'Client', 'Contact', 'Lead', 'Opportunity','Project', 'project task', 'Target', 'Task'] as $value => $item)
                                      <option value="{{$item}}">{{$item}}</option>
                                      @endforeach
                                    </select>
                                  </div>  
                          </div>

                    <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control form-control-sm" name="description" rows="2" id="description" placeholder="Enter description of the project"></textarea>
                    </div>
                    <div class="form-group ">
<<<<<<< HEAD
                        <label for="inputProject">Assigned To: </label>
                        {{-- <input type="text" name="assigned_to" class="form-control {{ $errors->has('assigned_to') ? ' is-invalid' : '' }} form-control-sm" placeholder="Enter name of a consultant"> --}}
                        <select name="assigned_to" id="" class="form-control">
                          <option value="Davis Agaba">Choose ..</option>
                          @foreach(Helpers::assigned('TCS') as $assign)                         
                          <option value="{{ $assign }}">{{ $assign }}</option>
                          @endforeach
                        </select>
=======
                        <label for="assignees">Assigned To: </label>
                        <select  name="assigned_to" class="form-control {{ $errors->has('assigned_to') ? ' is-invalid' : '' }} form-control-sm" id="assignees"></select>
>>>>>>> cce04fbecf75b8dd3e823514ab87bda49f173d56
                    </div>
                    <div class="pull-left">
                    <button type="submit" class="btn btn-outline-danger btn-lg">Save a task</button>
                    </div>
                  </form>
              </div>
        
      </div>
      	
@endSection
<<<<<<< HEAD
@section('script')
<script>
  function getValue(){
    let team =document.getElementById('inputTeam').value;
    return team;
  }
</script>

@stop
=======

@push("scripts")
<script>
var team = document.getElementById("inputTeam");
var assignees = document.getElementById("assignees");
var options = document.createDocumentFragment();
//add an empty option
options.appendChild(createOption("--select--", ""));

team.addEventListener("change", updateAssignees);

function updateAssignees(event) {
  //bail out for empty selections
  if (!team.value) return;
  console.log(team.value)
  window.APP_USERS.forEach(function(user) {
    if (user.team === team.value) {
      //add an option to the assigns
      options.appendChild(createOption(user.name, user.id));
    }
  });
  assignees.appendChild(options);
}
function createOption(text, value) {
  var option = document.createElement("option");
  option.text = text;
  option.value = value;
  return option;
}
</script>

@endpush
>>>>>>> cce04fbecf75b8dd3e823514ab87bda49f173d56
