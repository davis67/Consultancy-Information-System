@extends('layouts.app')
@push("head")
<script>
  window.APP_USERS={!! $users->toJson() !!}
</script>
@endpush
@section('content')
            <div  class="card">
              <div class="card-body">
                  <div class="card-title row">
                      <div class="text-dark col-md-4">
                          Edit an Opportunity
                      </div>
                    
                    <div class=" col-md-8">
                        <a href="{{ route('opportunities.index') }}" style="float:right" class="btn btn-outline-danger btn-sm pull-right"><i class="fa fa-fw fa-reply-all"></i>View all Opportunities</a>
                      </div>
                     </div>
                     {{ var_dump($errors) }}
                       <form method="post" action="{{ route('opportunities.update', $opportunity->id)}}">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                              <label for="opportunity_name">Opportunity Name:</label>
                              <textarea name="opportunity_name" class="form-control form-control-sm" rows="2" >{{ $opportunity->opportunity_name}}</textarea>
                                @if($errors->has('opportunity_name'))
                                  <span class="text-danger">
                                    {{$errors->first('opportunity_name')}}
                                  </span>
                                @endif
                      </div>
                  
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputType">Type</label>
                          <select id="inputType" name="business_number" class="form-control {{ $errors->has('business_number') ? ' is-invalid' : '' }} form-control-sm">
                            <option value="Existing Business @if($opportunity->business_number=='Existing Business') selected @endif">Existing Business</option>
                            <option value="New Business @if($opportunity->business_number=='New Business') selected @endif">New Business</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                                <label for="inputClient">Client Name</label>
                                <input type="text" class="form-control {{ $errors->has('client_name') ? ' is-invalid' : '' }} form-control-sm" name="client_name"  value="{{ $opportunity->client_name}}">
                              </div>
                      </div>

                      <div class="form-row ">
                            <div class="form-group col-md-4">
                              <label for="inputCountry">Country</label>
                              <input type="text" class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }} form-control-sm " name="country" value="{{ $opportunity->country}}">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputSalesStage">Sales Stage</label>
                              <select name="sales_stage" class="form-control {{ $errors->has('sales_stage') ? ' is-invalid' : '' }} form-control-sm ">
    
                                @foreach(['Prospecting', 'Qualification', 'EOI', 'Needs Analysis', 'Value Proposition', 'Id Decision Makers', 'Perception Analysis', 'Proposal/Price Quote',
                                'Negotiation/Review', 'Closed Won', 'Closed Lost', 'Submitted', 'Did Not Persue', 'Not Submitted'] as $value => $text)
                              <option value="{{$text}}" @if($opportunity->sales_stage==$text) selected @endif >{{$text}}</option>
                              @endforeach       
                              </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputDate">Expected Close Date</label>
                                <input type="date" name="expected_date" class="form-control {{ $errors->has('expected_date') ? ' is-invalid' : '' }} form-control-sm " value="{{  $opportunity->expected_date}}">  
                             </div>                       
                          </div>
                              <div class="form-row ">
                          <div class="form-group col-6">
                            <label for="inputRef">Revenue</label>
                            <input type="text" class="form-control form-control-sm " name="revenue" value="{{  $opportunity->revenue}}">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputType">Currency</label>
                                <select id="inputType" name="currency" class="form-control form-control-sm ">
                                  @foreach(['Euro: €', 'Dollar: $', 'Uganda Shillings: UGX'] as $value =>$item)
                                  <option value="{{ $item }}" @if($opportunity->currency==$item) selected @endif>{{ $item }} </option>
                                  @endforeach
                                </select>
                              </div>
                      </div> 
                      <div class="form-row">
                            <div class="form-group col-md-3">
                                    <label for="inputClient">Leads Source</label>
                                    <select id="inputSalesStage" class="form-control {{ $errors->has('leads_name') ? ' is-invalid' : '' }} form-control-sm "  name="leads_name" >
                                    
                                            @foreach(['Cold call', 'Existing customer', 'Self Generated', 'Employee', 'Partner', 'Public Relations', 'Direct Mail', 'Conference', 'Trade Show', 'website', 'word of mouth', 'Email', 'Compaign', 'other'] as $value => $item)
                                            <option value="{{$item}}" @if($opportunity->leads_name==$item) selected @endif>{{$item}}</option> 
                                            @endforeach
                                          </select>
                                  </div>
                        <div class="form-group col-md-3">
                              <label for="inputZip">Internal Deadline</label>
                              <input type="date" class="form-control {{ $errors->has('internal_deadline') ? ' is-invalid' : '' }} form-control-sm " name = "internal_deadline" value="{{  $opportunity->internal_deadline}}">
                        </div>
                        <div class="form-group col-md-3">
                              <label for="inputTeam">Team </label>
                              <select class="form-control {{ $errors->has('team') ? ' is-invalid' : '' }} form-control-sm " name="team" id="inputTeam">
                                @foreach(['TCS', 'DCS', 'MCS', 'CSS', 'BDS', 'HTA', 'HCM', 'SPS', 'HillGroove'] as $value => $item)
                                <option value="{{$item}}" @if($opportunity->team==$item) selected @endif>{{$item}}</option>
                                @endforeach
                              </select>                      
                        </div>
                        <div class="form-group col-3">
                                <label for="inputRef">Probability(%)</label>
                                <input type="text" class="form-control {{ $errors->has('probability') ? ' is-invalid' : '' }} form-control-sm" name="probability"  value="{{ $opportunity->probability}}">
                         </div>
                      </div>            
                      <div class="form-row">
                        <div class="form-group col-3">
                            <label for="inputRef">Reference Number</label>
                            <input type="text" class="form-control {{ $errors->has('reference_number') ? ' is-invalid' : '' }} form-control-sm " name="reference_number" value="{{  $opportunity->reference_number}}">
                        </div>
                        <div class="form-group col-3">
                            <label for="inputRef">Next Step</label>
                            <input type="text" class="form-control {{ $errors->has('next_step') ? ' is-invalid' : '' }} form-control-sm"  name="next_step" value="{{  $opportunity->next_step}}">
                        </div>
                        <div class="form-group col-3">
                            <label for="inputRef">Objective/Number of Licences</label>
                            <input type="number" class="form-control form-control-sm" name="number_of_licence" value= "{{  $opportunity->number_of_licence}}">
                        </div>
                        
                        <div class="form-group col-3">
                            <label for="inputRef">Partners</label>
                            <input type="text" class="form-control {{ $errors->has('partners') ? ' is-invalid' : '' }} form-control-sm " name="partners"  value="{{  $opportunity->partners}}">
                        </div>
                        
                    </div>

                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="inputProject">Funded By</label>
                            <input type="text" class="form-control {{ $errors->has('funded_by') ? ' is-invalid' : '' }} form-control-sm " name="funded_by" value="{{  $opportunity->funded_by}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputType">Year</label>
                            <input type="text" class="form-control {{ $errors->has('year') ? ' is-invalid' : '' }} form-control-sm " name="year" value="{{ $opportunity->year}}"> 
                        </div>
                    </div>


                      <div class="form-group">
                              <label for="description">Description:</label>
                              <textarea name="description" class="form-control form-control-sm" rows="3">{{ $opportunity->description}}</textarea>
                      </div>
                      <div class="form-group ">
                          <label for="assignees">Assigned To: </label>
                          <select  name="assigned_to[]" class="form-control {{ $errors->has('assigned_to') ? ' is-invalid' : '' }} form-control-sm" id="assignees" multiple></select>
                      </div>
                      <div class="pull-left">
                      <button type="submit" class="btn btn-outline-danger ">Update Opportunity</button>
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