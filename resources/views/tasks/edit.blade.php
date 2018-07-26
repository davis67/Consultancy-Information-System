@extends('layouts.app')
@push("head")
<script>
  window.APP_USERS={!! $users->toJson() !!}
</script>
@endpush
@section('content')
    	<div class="card">
         <div class="card-body">
           <h2 class="card-title">Update Task</h2>
            <form action="{{route('tasks.store')}}" method="post">
            	@csrf
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <label for="inputTask">Task Name</label>
                        <input type="text" name="task_name" class="form-control {{ $errors->has('task_name') ? ' is-invalid' : '' }} form-control-sm" value="{{ $task->task_name }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputState">Status</label>
                        <select  class="form-control {{ $errors->has('task_status') ? 'is-invalid' : '' }} form-control-sm" name="task_status">
                          @foreach(['Not started', 'In Progress', 'Completed', 'Pending input', 'Deffered'] as $item => $value)
                          <option value="{{$value}} @if($task->task_status==$value) selected @endif">{{$value}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-row ">
                            <div class="form-group col-md-6">
                                    <label for="inputState">Priority</label>
                                    <select id="inputState" name="priority" class="form-control {{ $errors->has('priority') ? ' is-invalid' : '' }}">
                                      <option value="High @if($task->priority == 'High') selected @endif">High</option>
                                      <option value="Medium @if($task->priority == 'Medium') selected @endif">Medium</option>
                                      <option value="Low @if($task->priority == 'Low') selected @endif">Low</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-6">
                                        <label for="inputState">Service Line</label>
                                <select id="inputState" name="service_line" class="form-control {{ $errors->has('service_line') ? ' is-invalid' : '' }} form-control-sm">
		                          @foreach(App\Task::serviceLines() as $item => $value)
                                  <option value="{{$value}} @if($task->service_line==$value) selected @endif">{{$value}}</option>
		                          @endforeach
		                      </select>
                             </div>
                         </div>   
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="inputCity">Start Date</label>
                        <input type="date" class="form-control {{ $errors->has('start_date') ? ' is-invalid' : '' }} form-control-sm" name="start_date" value="{{ $task->start_date }}">
                        
                      </div>
                      <div class="form-group col-md-3">
                            <label for="inputZip">End Date</label>
                            <input type="date" name="end_date" class="form-control {{ $errors->has('end_time') ? ' is-invalid' : '' }} form-control-sm" value="{{ $task->end_date }}">
                      </div>
                      <div class="form-group col-md-3">
                            <label for="inputTeam">Team </label>
                            <select  class="form-control {{ $errors->has('team') ? ' is-invalid' : '' }} form-control-sm" name="team" id="inputTeam">
                                @foreach(App\Team::names() as  $team)
                                <option value="{{$team}}" @if($task->team==$team) selected @endif>{{$team}}</option>
                                @endforeach
                              </select>     
                      </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">Related To:</label>
                                    <select id="inputState" name="related_to" class="form-control {{ $errors->has('related_to') ? ' is-invalid' : '' }} form-control-sm">
                                      @foreach(['Bug', 'Case', 'Client', 'Contact', 'Lead', 'Opportunity','Project', 'project task', 'Target', 'Task'] as $value => $item)
                                      <option value="{{$item}}  value="{{ $task->related_to }}"">{{$item}}</option>
                                      @endforeach
                                    </select>
                                  </div>  
                          </div>

                    <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control form-control-sm" name="description" rows="2">{{ $task->description }}</textarea>
                    </div>
                    <div class="form-group ">
                        <label for="assignees">Assigned To: </label>
                        <select  name="assigned_to" class="form-control {{ $errors->has('assigned_to') ? ' is-invalid' : '' }} form-control-sm" id="assignees"multiple></select>
                    </div>
                    <div class="pull-left">
                    <button type="submit" class="btn btn-outline-danger btn-lg">Save a task</button>
                    </div>
                  </form>
              </div>
        
      </div>
@stop

@push("scripts")
<script>
var team = document.getElementById("inputTeam");
var assignees = document.getElementById("assignees");


team.addEventListener("change", updateAssignees);

function updateAssignees(event) {
  assignees.innerHTML=null;
  var options = document.createDocumentFragment();
  //add an empty option
  options.appendChild(createOption("--select--", ""));
  //bail out for empty selections
  if (!team.value) return;
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