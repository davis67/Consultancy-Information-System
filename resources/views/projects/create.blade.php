
@extends('layouts.app')
@push("head")
<script>
  window.APP_USERS={!! $users->toJson() !!}
</script>
@endpush
@section('content')

<div class="card">
              <div class="card-body">
                 <h3 class="card-title text-center">Create a Project</h3>
              <form  method="post" action="{{ route('projects.store') }}">
                      @csrf
                        <div class="form-group row">
                            <label for="date" class="col-md-2 col-form-label text-md-right">Team:</label>
  
                            <div class="col-md-8">
                                <select id="inputTeam" class="form-control" name="team">
                                    <option value="">Choose...</option>
                                    @foreach(App\Team::names() as  $team)
                                    <option value="{{$team}}">{{$team}}</option>
                                    @endforeach
                                  </select>  
                              </div>
                        </div>
                      <div class="form-group row">
                          <label for="date" class="col-md-2 col-form-label text-md-right">Start Date:</label>

                          <div class="col-md-8">
                              <input id="date" type="date" class="form-control" name="start_date">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="date" class="col-md-2 col-form-label text-md-right">End Date:</label>

                          <div class="col-md-8">
                              <input id="date" type="date" class="form-control" name="end_date">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="date" class="col-md-2 col-form-label text-md-right">Contract Ref No:</label>

                          <div class="col-md-8">
                              <input id="contract" type="text" class="form-control" name="contractRefNo">
                          </div>
                      </div>
                      <input type="hidden" name="opportunityid" value="{{ $opportunityName}}">

                      <div class="form-group row">
                          <label for="password" class="col-md-2 col-form-label text-md-right">Assigned To:</label>

                          <div class="col-md-8">
                              <select  multiple="multiple" name="assigned_to[]" class="form-control form-control-sm"  id="assignees"></select>
                            </div>
                      </div>
                      <div class="form-group row">
                          <label for="stages" class="col-md-2 col-form-label text-md-right">Project Manager:</label>

                          <div class="col-md-8">
                              <select  name="manager" class="form-control form-control-sm"  id="stages">
                                  <option value="">Select a project manager</option>
                                  @foreach($users as $user)
                                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                                  @endforeach
                              </select>
                            </div>
                      </div>
                      <div class="form-group row">
                          <label  class="col-md-3 col-form-label text-md-right"></label>

                          <div class="col-md-8">
                          <button type="submit" class="btn btn-md btn-outline-danger" style="border-radius:none;">Save Project</button>                            
                      </div>
                      </div>

                    </form>
          </div>
        </div>
@endSection

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