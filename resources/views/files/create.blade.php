@extends('layouts.app')
@push("head")
<script>
  window.APP_USERS={!! $users->toJson() !!}
</script>
@endpush
@section('content')
<div class="card">
    <div class="card-body">
            <div class="card-title row">
                    <div class="text col-md-4">
                        Create a document
                    </div>
                  
                  <div class=" col-md-8">
                      <a href="{{ route('documents.index') }}" style="float:right" class="btn btn-outline-danger btn-sm pull-right"><i class="fa fa-fw fa-reply-all"></i>View All Documents</a>
                    </div>
                   </div>
	<div class="row">
		<div class="col-md-7 offset-xs-1" >
            <label>Drop Your files here</label>
            <form action="{{ route('files.store') }}"  method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="document" class="form-control"/>    
        </div>
        <div class="col-md-5">
            <p class="text-danger required">Note</p>
            <p><i class="mdi mdi-hand"></i>The doc sh'd be a recognisable doc type eg .pdf, .xls. .docx</p>
            <p>The size of the file sh'd be <= 256MiB</p>
            <p>Make sure that a document is well formatted</p>
            <p>The drop box will disappear after expected time expires</p>
        </div>
	</div>
            <h5 style="margin-top:30px;">Document details</h5>
            <hr/>
          
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="inputCity">Publish Date</label>
                        <input type="dateTime-local" class="form-control form-control-sm" name="publish_date" id="inputCity">
                        
                      </div>
                      <input type="file" name="file" style='display:none'>    

                      <div class="form-group col-md-3">
                            <label for="inputZip">Expiration Date</label>
                            <input type="dateTime-local" class="form-control form-control-sm" name="expiration_date" id="inputZip">
                      </div>
                      <div class="form-group col-md-3">
                            <label for="inputTeam">Team </label>
                            <select id="inputTeam" name="team" class="form-control form-control-sm">
                              <option value="">Choose...</option>
                              @foreach(['TSS', 'DCS', 'MCS', 'CSS', 'BDS', 'HTA', 'HCM', 'SPS', 'HillGroove'] as $value => $item)
                                <option value="{{$item}}">{{$item}}</option>
                                @endforeach
                            </select>
                        
                      </div>
                      <div class="form-group col-md-3">
                            <label for="inputTeam">Category </label>
                            <select id="inputTeam" name="category" class="form-control form-control-sm">
                              <option value="">Choose...</option>
                              @foreach(['Marketing', 'Knowledge Base', 'Sales', 'Inception report', 'Terms of Reference', 'CV', 'Financial Proposal', 'Technical report', 'Request for Proposal'] as $item =>$value)
                              <option value="{{$value}}">{{$value}}</option>
                              @endforeach
                            </select>
                        
                      </div>

                    </div>
                    <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" rows="3" name="description" placeholder="Enter description of the project"></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="inputProject"><i class="mdi mdi-attach"></i>Attach To: </label>
                        <select class="form-control form-control-sm" name="assigned_to" id="assignees"></select>
                    </div>
                    <div class="pull-left">
                    <button type="submit" class="btn btn-outline-danger btn-lg">Save a document</button>
                    </div>
            </form>
		</div>
    </div>
    </div>
</div>
@endsection

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
      options.appendChild(createOption(user.name, user.name));
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