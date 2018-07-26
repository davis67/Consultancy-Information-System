@extends('layouts.app')
@push("head")
<script>
  window.APP_USERS={!! $users->toJson() !!}
</script>
@endpush
@section('content')

            <div  class="card">
              <div class="card-body">
               {{-- {{   var_dump($errors)}} --}}
                  <div class="card-title row">
                      <div class="text col-md-4">
                          Create a Opportunity
                      </div>
                    
                    <div class=" col-md-8">
                        <a href="{{ route('opportunities.index') }}" style="float:right" class="btn btn-outline-danger btn-sm pull-right"><i class="fa fa-fw fa-reply-all"></i>View All Opportunities</a>
                      </div>
                     </div>
              <form class="form" method="post" action="{{route('opportunities.store')}}">
                      @csrf
                      <div class="form-group">
                              <label for="opportunity_name">Opportunity Name:</label>
                              <textarea name="opportunity_name" class="form-control form-control-sm" rows="2"  placeholder="Enter opportunity" value="{{old('opportunity_name')}}"></textarea>
                                @if($errors->has('opportunity_name'))
                                  <span class="text-danger">
                                    {{$errors->first('opportunity_name')}}
                                  </span>
                                @endif
                      </div>
                  
                        <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="inputType">Type</label>
                          <select id="inputType" name="business_number" class="form-control {{ $errors->has('business_number') ? ' is-invalid' : '' }} form-control-sm">
                            <option value="">Choose...</option>
                            <option value="0 {{old('business_number')}}">Existing Business</option>
                            <option value="1 {{old('business_number')}}">New Business</option>
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                                <label for="inputClient">Client Name</label>
                                <input type="text" class="form-control {{ $errors->has('client_name') ? ' is-invalid' : '' }} form-control-sm" name="client_name" placeholder="Enter Client name" value="{{old('client_name')}}">
                              </div>
                        <div class="form-group col-md-4">
                            <label for="inputCountry">Country</label>
                            <input type="text" class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }} form-control-sm " name="country" placeholder="Enter country name" value="{{old('country')}}">
                          </div>
                      </div>

                      <div class="form-row ">
                           
                            <div class="form-group col-md-4">
                                <label for="inputDate">Expected Close Date</label>
                                <input type="date" name="expected_date" class="form-control {{ $errors->has('expected_date') ? ' is-invalid' : '' }} form-control-sm " value="{{old('date')}}">  
                             </div>                       
                          <div class="form-group col-4">
                            <label for="inputRef">Revenue</label>
                            <input type="number" class="form-control form-control-sm " name="revenue" id="inputRevenue" placeholder="Enter Revenue.">
                          </div>
                          <div class="form-group col-md-4">
                              <label for="inputType">Currency</label>
                                <select id="inputType" name="currency" class="form-control form-control-sm ">
                                  <option value="">Choose..</option>
                                  @foreach(['Euro: €', 'Dollar: $', 'Uganda Shillings: UGX'] as $value =>$item)
                                  <option value="{{ $item }}">{{ $item }} </option>
                                  @endforeach
                                </select>
                              </div>
                      </div> 
                      <div class="form-row">
                            <div class="form-group col-md-3">
                                    <label for="inputClient">Leads Source</label>
                                    <select id="inputSalesStage" class="form-control {{ $errors->has('leads_name') ? ' is-invalid' : '' }} form-control-sm "  name="leads_name" >
                                            <option value="">Choose...</option>
                                            @foreach(['Cold call', 'Existing customer', 'Self Generated', 'Employee', 'Partner', 'Public Relations', 'Direct Mail', 'Conference', 'Trade Show', 'website', 'word of mouth', 'Email', 'Compaign', 'other'] as $value => $item)
                                            <option value="{{$value}}" {{old('leads_name')==$item ? 'selected':''}}>{{$item}}</option> 
                                            @endforeach
                                          </select>
                                  </div>
                        <div class="form-group col-md-3">
                              <label for="inputZip">Internal Deadline</label>
                              <input type="date" class="form-control {{ $errors->has('internal_deadline') ? ' is-invalid' : '' }} form-control-sm " name = "internal_deadline" id="inputZip" value="{{old('internal_deadline')}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputTeam">Team </label>
                            <select id="inputTeam" class="form-control {{ $errors->has('team') ? ' is-invalid' : '' }} form-control-sm" name="team">
                                <option value="">Choose...</option>
                                @foreach(App\Team::names() as  $team)
                                <option value="{{$team}}">{{$team}}</option>
                                @endforeach
                              </select>     
                      </div>
                        <div class="form-group col-3">
                                <label for="inputRef">Probability(%)</label>
                                <input type="number" class="form-control {{ $errors->has('probability') ? ' is-invalid' : '' }} form-control-sm" name="probability" id="inputRevenue" placeholder="Enter Probability in %." value="{{old('probability')}}">
                         </div>
                      </div>            
                      <div class="form-row">
                        <div class="form-group col-3">
                            <label for="inputRef">Reference Number</label>
                            <input type="text" class="form-control {{ $errors->has('reference_number') ? ' is-invalid' : '' }} form-control-sm " name="reference_number" id="inputRevenue" placeholder="Enter Reference No" value="{{old('reference_number')}}">
                        </div>
                        <div class="form-group col-3">
                            <label for="inputRef">Next Step</label>
                            <input type="text" class="form-control {{ $errors->has('next_step') ? ' is-invalid' : '' }} form-control-sm" id="inputRevenue" name="next_step" placeholder="Enter next step" value="{{old('next_step')}}">
                        </div>
                        <div class="form-group col-3">
                            <label for="inputRef">Objective/Number of Licences</label>
                            <input type="number" class="form-control form-control-sm" name="number_of_licence" id="inputRevenue" placeholder="Enter No. of Licences" value="{{old('number_of_licence')}}">
                        </div>
                        
                        <div class="form-group col-3">
                            <label for="inputRef">Partners</label>
                            <input type="text" class="form-control {{ $errors->has('partners') ? ' is-invalid' : '' }} form-control-sm " name="partners" id="inputRevenue" placeholder="Enter Partners" value="{{old('partners')}}">
                        </div>
                        
                    </div>

                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="inputProject">Funded By</label>
                            <input type="text" class="form-control {{ $errors->has('funded_by') ? ' is-invalid' : '' }} form-control-sm " name="funded_by" placeholder="Enter Funder's name" value="{{old('funded_by')}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputType">Year</label>
                            <input type="text" class="form-control {{ $errors->has('year') ? ' is-invalid' : '' }} form-control-sm " name="year" placeholder="Enter Year" value="{{old('year')}}"> 
                        </div>
                    </div>


                      <div class="form-group">
                              <label for="description">Description:</label>
                              <textarea name="description" class="form-control form-control-sm" rows="3"  placeholder="Enter description of the project" value="{{old('description')}}"></textarea>
                      </div>
                      <div class="form-group ">
                          <label for="assignees">Assigned To: </label>
                          <select  multiple="multiple" name="assigned_to[]" class="form-control {{ $errors->has('assigned_to') ? ' is-invalid' : '' }} form-control-sm" id="assignees"></select>
                      </div>
                      <div class="pull-left">
                      <button type="submit" class="btn btn-outline-danger ">Save Opportunity</button>
                      </div>
                    </form>
          </div>
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