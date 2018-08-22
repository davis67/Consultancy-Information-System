<!doctype html>
<html lang="en">

@include('partials.head')
@yield('styles')
<body>
 <div class="container-scroller">
  @if(!Auth::guest())
  @include("layouts.navbar")
  <div class="container-fluid page-body-wrapper">
    @include('partials.todo')
    @include('layouts.sidebar')
    @endif
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
       @yield('content')
     </div>
   </div>
 </div>
</div>
@include('layouts.footer')

@yield('script')
@include('partials.scripts')
@include("partials.flash")



{{-- Errors --}}
<div class="modal fade" id="warn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white text-center">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="warnmsg">
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger confirm" data-token="{{ csrf_token() }}">Yes, Delete</button>
          <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
      </div>
    </div>
  </div>
</div>
{{-- Empty Modal to show everything--}}
<div class="modal fade bs-example-modal-lg" id="everything" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>           
          <!-- Modal body -->
          <div class="modal-body" id="showAll">

          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
              <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">
                  Close
              </button>
          </div>   
      </div>
  </div>
</div>

{{-- Opportunities--}}
<div class="modal fade bs-example-modal-lg" id="addOpportunity" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Create Opportunity</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>           
          <!-- Modal body -->
          <div class="modal-body" id="showAll">
              <form class="form" method="post" action="{{url('opportunities')}}">
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
                      <div class="form-group col-md-3">
                          <label for="inputType">Type</label>
                          <select name="business_number" class="form-control {{ $errors->has('business_number') ? ' is-invalid' : '' }} form-control-sm">
                          <option value="">Choose...</option>
                          <option value="0 {{old('business_number')}}">Existing Business</option>
                          <option value="1 {{old('business_number')}}">New Business</option>
                          </select>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="inputClient">Client Name</label>
                          <input type="text" class="form-control {{ $errors->has('client_name') ? ' is-invalid' : '' }} form-control-sm" name="client_name" placeholder="Enter Client name" value="{{old('client_name')}}">
                      </div>
                      <div class="form-group col-md-3">
                          <label for="inputCountry">Country</label>
                          <input type="text" class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }} form-control-sm " name="country" placeholder="Enter country name" value="{{old('country')}}">
                      </div> 
                  </div>

                  <div class="form-row ">
                          <div class="form-group col-md-6">
                              <label for="inputProject">Funder</label>
                              <input type="text" class="form-control {{ $errors->has('funder') ? ' is-invalid' : '' }} form-control-sm " name="funder" placeholder="Enter Funder's name" value="{{old('funder')}}">
                          </div>
                      <div class="form-group col-md-3">
                          <label for="inputType">Currency</label>
                          <select name="currency" class="form-control form-control-sm ">
                              <option value="">Choose..</option>
                              @foreach(['Euro: €', 'Dollar: $', 'Uganda Shillings: UGX'] as $value =>$item)
                              <option value="{{ $item }}">{{ $item }} </option>
                              @endforeach
                          </select>
                      </div>
                        <div class="form-group col-3">
                          <label for="inputRef">Revenue</label>
                          <input type="text" class="form-control form-control-sm " name="revenue"  placeholder="Enter Revenue.">
                        </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-3">
                          <label for="inputDate">Expected Close Date</label>
                          <input type="date" name="date" class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }} form-control-sm " value="{{old('date')}}">  
                      </div>
                      <div class="form-group col-md-3">
                          <label for="inputZip">Internal Deadline</label>
                          <input type="date" class="form-control {{ $errors->has('internal_deadline') ? ' is-invalid' : '' }} form-control-sm " name = "internal_deadline" id="inputZip" value="{{old('internal_deadline')}}">
                      </div>                       
                  <div class="form-group col-3">
                        <label for="inputRef">Reference Number</label>
                        <input type="text" class="form-control {{ $errors->has('reference_number') ? ' is-invalid' : '' }} form-control-sm " name="reference_number"  placeholder="Enter Reference No" value="{{old('reference_number')}}">
                    </div>                      
                    <div class="form-group col-3">
                        <label for="inputRef">Partners</label>
                        <input type="text" class="form-control {{ $errors->has('partners') ? ' is-invalid' : '' }} form-control-sm " name="partners"  placeholder="Enter Partners" value="{{old('partners')}}">
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
                            <input type="number" class="form-control {{ $errors->has('probability') ? ' is-invalid' : '' }} form-control-sm" name="probability"  placeholder="Enter Probability in %." value="{{old('probability')}}">
                     </div>
                     <div class="form-group col-3">
                          <label for="inputRef">Objective/Number of Licences</label>
                          <input type="number" class="form-control form-control-sm" name="number_of_licence"  placeholder="Enter No. of Licences" value="{{old('number_of_licence')}}">
                      </div>
                  </div> 
                  <div class="form-row">
                  
                  <div class="form-group col-md-6">
                      <label for="assignees">Assigned To: </label>
                      <select  multiple="multiple" name="assigned_to[]" class="form-control {{ $errors->has('assigned_to') ? ' is-invalid' : '' }} form-control-sm" id="assignees"></select>
                  </div>
                  <div class="form-group col-md-6">
                      <label for="description">Description:</label>
                      <textarea name="description" class="form-control form-control-sm" rows="3"  placeholder="Enter description of the project" value="{{old('description')}}"></textarea>
                  </div>
                  </div>
              </form>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
              <button type="button" id="oppSave" class="btn btn-outline-danger ">Save</button>
              <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
          </div>   
      </div>
  </div>
</div>
{{-- Teams --}}
<div class="modal fade" id="addTeams">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Create Team</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <form action="{{url('teams')}}" method="POST" autocomplete="off" id="teamsForm">
              @csrf
              <div class="row">
                  <div class="col-md-12">
                      <label>Team Name:</label>
                      <input type="text" class="form-control" name="teamname">
                  </div>
              </div>
              <div class="row">
              <div class="col-md-3">
                  <label>Initial:</label>
                  <input type="text" class="form-control" name="initial">
              </div>
              <div class="col-md-3">
                      <label>Team Code:</label>
                      <input type="text" class="form-control" name="teamcode">
                  </div>
              <div class="col-md-6">
              <label>Team Leader:</label>
                  <input type="text" class="form-control" name="teamleader" value="Unassigned">
              </div>
              </div>
          </form>
      </div>
          <!-- Modal footer -->
      <div class="modal-footer">
          <button type="button" id="teamBtn" class="btn btn-outline-danger">Save</button>
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
      </div>        
  </div>
</div>
</div>

{{-- Edit Teams --}}
<div class="modal fade" id="editTeam">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Edit Team</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <form autocomplete="off" id="teameditForm">
              {{method_field('PUT')}}
              @csrf
              <div class="row">
                  <div class="col-md-12">
                      <label>Team Name:</label>
                      <input type="text" class="form-control" name="teamname" id="teamname">
                  </div>
              </div>
              <div class="row">
              <div class="col-md-3">
                  <label>Initial:</label>
                  <input type="text" class="form-control" name="initial" id="initial">
              </div>
              <div class="col-md-3">
                      <label>Team Code:</label>
                      <input type="text" class="form-control" id="teamcode">
                  </div>
              <div class="col-md-6">
              <label>Team Leader:</label>
                  <input type="text" class="form-control" name="teamleader" id="teamleader">
                  <input type="hidden" name="teamid" id="teamid">
              </div>
              </div>
          </form>
      </div>
          <!-- Modal footer -->
      <div class="modal-footer">
              <button type="submit" id="teamUpt" class="btn btn-outline-danger" data-dismiss="modal">Update</button>
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
      </div>        
  </div>
</div>
</div>

{{-- User Roles --}}
<div class="modal fade" id="addRole">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Role</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>           
      <!-- Modal body -->
      <div class="modal-body">
          <form id="rolesForm" autocomplete="off">
              @csrf
              <div class="row">
                  <div class="col-md-12">
                      <label>Role Name:</label>
                      <input type="text" class="form-control" name="rolename">
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <label>Description:</label>
                      <input type="text" class="form-control" name="roledesc">
                  </div>
              </div>
          </form>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" id="roleBtn" class="btn btn-outline-danger">Save</button>
        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
      </div>   
  </div>
  </div>
</div>

{{-- Edit Roles --}}
<div class="modal fade" id="editRoles">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Role</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>           
          <!-- Modal body -->
          <div class="modal-body">
                  <form id="roleditForm" autocomplete="off">
                      {{method_field('PUT')}}
                      @csrf
                      <div class="row">
                          <div class="col-md-12">
                              <label>Role Name:</label>
                              <input type="text" class="form-control" name="rolename" id="rolename">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <label>Description:</label>
                              <input type="text" class="form-control" name="roledesc" id="roledesc">
                              <input type="hidden" name="roleid" id="roleid">
                          </div>
                      </div>
                  </form>
              </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" id="roleUp" class="btn btn-outline-danger" data-dismiss="modal">Update</button>
            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
          </div>   
      </div>
  </div>
</div>

{{-- Meats --}}
<div class="modal fade bs-example" id="addMeat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
    <h4 class="modal-title">Work Time</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>           
  <!-- Modal body -->
  <div class="modal-body">
      <form autocomplete="off" id="meatsForm">
          @csrf
  <div class="row">

      <div class="col-md-12">
          <label>Target Beneficiary:</label>
          <br><input type="radio" name="beneficiary" class="radio-label" value="Administration" required> Administration &nbsp;<input type="radio" name="beneficiary" class="radio-label" value="Personal" required>Personal&nbsp;<input type="radio" name="beneficiary" class="radio-label" value="Opportunities" required>Project / Opportunity
      </div>
  </div>
  <div class="row">
      <div class="col-md-8">
         <label>Service Line:</label>
         <select type="text" class="form-control" id="serviceline">
              <option value="">- Select Service Line -</option>
              <option value="Monitoring & Evaluation Services">Monitoring & Evaluation Services</option>
              <option value="Recruitment Services">Recruitment Services</option>
              <option value="Human Resource Services">Human Resource Services</option>
              <option value="Training & Capacity Building Services">Training & Capacity Building Services</option>
              <option value="Outsourced Financial Services">Outsourced Financial Services</option>
              <option value="ICT/MIS Services">ICT/MIS Services</option>
              <option value="Procurement Services">Procurement Services</option>
              <option value="Public Sector Management Services">Public Sector Management Services</option>
              <option value="IS Audits">IS Audits</option>
              <option value="ACL">ACL</option>
              <option value="Enterprise Risk Assessor">Enterprise Risk Assessor</option>
              <option value="Local Government">Local Government</option>
              <option value="Management Consultancy">Management Consultancy</option>
              <option value="Financial Advisory">Financial Advisory</option>
              <option value="Prequalifications for Consultancy Services">Prequalifications for Consultancy Services</option>
              <option value="Business Development">Business Development</option>
              <option value="Infrastructure Consulting">Infrastructure Consulting</option>
              <option value="Service Support(Indirect Activities)">Service Support(Indirect Activities)</option>
              <option value="Research">Research</option>
              <option value="Financial Advisory">Financial Advisory</option>
              <option value="Training">Training</option>
              <option value="Corporate Affairs-Legal">Corporate Affairs-Legal</option>
              <option value="Corporate Affairs- Human Resource">Corporate Affairs- Human Resource</option>
              <option value="Corporate Affairs- Finance">Corporate Affairs- Finance</option>
              <option value="Corporate Affairs- Administration">Corporate Affairs- Administration</option>
              <option value="Corporate Affairs- IT Support">Corporate Affairs- IT Support</option>
              <option value="No Work">No Work</option>
              <option value="Time off">Time off</option>
              <option value="Meetings">Meetings</option>
         </select>
      </div>
      <div class="col-md-4" id="omNum" style="display:none;">
          <label>OM NUmber:</label><input type="number" name="OMNumber" class="form-control">
      </div>
  </div>
  <div class="row">
      <div class="col-md-5">
          <label>Select Date:</label>
          <input type="date" class="form-control" name="activityDate">
      </div>
      <div class="col-md-4">
          <label>Time taken (Hours):</label>
          <select type="text" id="duration" class="form-control">
              @foreach(range(0,24) as $hours)
                  <option value="{{$hours}}">{{$hours}} Hours</option>
              @endforeach
          </select>
      </div>
  </div>
  <div class="row">
   <div class="col-md-12">
   <label>Description:</label>
      <textarea type="text" class="form-control" id="activityDesc"></textarea>
   </div>
  </div>
  </div>
  <!-- Modal footer -->
  <div class="modal-footer">
    <button type="button" id="meatBtn" class="btn btn-outline-danger">Save</button>
    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
  </form>
  </div>   
</div>
</div>
</div>


{{-- Update Meats --}}
<div class="modal fade bs-example-modal-lg" id="editMeatm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Update Work Time</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>           
      <!-- Modal body -->
      <div class="modal-body">
          <form  autocomplete="off" id="meatsEdit">
          @csrf
              <div class="row">
                  <div class="col-md-4">
                      <label>Target Beneficiary:</label>
                      <br><input type"text" name="beneficiary" class="form-control" id="oldbeneficiary" value="Opportunity">
                  </div>
                  <div class="col-md-8">
                      <label>Service Line:</label>
                      <input type="text" class="form-control" name="serviceline" id="servicelines">
                  </div>
                  
              </div>
              <div class="row">
                  <div class="col-md-5">
                      <label>Select Date:</label>
                      <input type="date" class="form-control" name="activityDate" id="activitydate">
                  </div>
                  <div class="col-md-3">
                      <label>Time taken:</label>
                      <input type="text" name="duration" class="form-control" id="durations">
                  </div>
                  <div class="col-md-4" id="omNumber">
                      <label>OM Numbe:</label>
                      <input type="text" class="form-control" name="OMNumber" id="omnumber">
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                  <label>Description:</label>
                  <textarea type="text" class="form-control" name="activityDesc" id="activitydesc"></textarea>
                  <input type="hidden" name="meatid" id="meatid">
                  </div>
              </div>
          </form>    
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
          <button type="submit" id="meatUpt" class="btn btn-outline-danger">Update</button>
          <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
      </div>   
  </div>
</div>
</div>

{{-- Bid Scores --}}
<div class="modal fade bs-example-modal-lg" id="addScore" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Bid records for Technical and Financial Scores</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
          <form action="{{url('scores')}}" method="post" autocomplete="off">
              @csrf
              <div class="row">
                  <div class="col-md-4">
                      <label>Opportunity Matrix:</label>
                      <input type="text" name="opportunity" value="" class="form-control" placeholder="OM Number of the opportunity" required>
                  </div>
              <div class="col-md-4">
                  <label>Bid opening date:</label><br>
                  <div class="input-group mb-3">
                      <input type="date" name="opening_date" value="" class="form-control" required>
                      <div class="input-group-append">
                          <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"></i></span>
                      </div>
                  </div>
              </div>
              
              </div>
              <br>
              <div class="row">
                  <div class="col-md-12">
                      <label>Bidding Details</label>
                      <table class="table table-bordered table-sm" id="scores_table">
                          <thead>
                              <tr>
                              <th scope="col">Name of the Firm</th>
                              <th scope="col">Technical Scores</th>
                              <th scope="col">Financial Scores</th>
                              <th scope="col"></th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                              <td><input type="text" name="firmname[]" class="form-control" required></td>
                              <td><input type="number" name="techscore[]" class="form-control" required></td>
                              <td><input type="number" name="financial_score[]" class="form-control" required></td>
                              <td><button  type="button" id="add_score" name="firm" class="btn btn-outline-danger">Add</button></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
          <input type="submit" class="btn btn-outline-danger" value="Submit">
      </form>
      <button type="reset" class="btn  btn-outline-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
      </div>
  </div>
</div>

{{-- Divisions --}}
<div class="modal fade" id="addDivs">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add Division</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>           
          <!-- Modal body -->
          <div class="modal-body">
              <form id="divsForm" autocomplete="off">
                  @csrf
           <div class="row">
           <div class="col-md-12">
              <label>Division Name:</label>
              <input type="text" class="form-control" name="divname">
           </div>
          </div>
          <div class="row">
              <div class="col-md-3">
                  <label>Initual:</label>
                  <input type="text" class="form-control" name="initual">
              </div>
              <div class="col-md-3">
                  <label>Code:</label>
                  <input type="text" class="form-control" name="divcode">
              </div>
              <div class="col-md-6">
                  <label>Division Head:</label>
                  <input type="text" class="form-control" name="divhead" value="Unassigned">
              </div>
          </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" id="divBtn" class="btn btn-outline-danger" data-dismiss="modal">Save</button>
            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
          </form>
          </div>   
      </div>
      </div>
  </div>

{{-- Edit Divisions --}}
<div class="modal fade" id="editDivs">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Division</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>           
          <!-- Modal body -->
          <div class="modal-body">
              <form id="diveditForm" autocomplete="off">
                  {{method_field('PUT')}}
                  @csrf
           <div class="row">
           <div class="col-md-12">
              <label>Division Name:</label>
              <input type="text" class="form-control" name="divname" id="divname">
           </div>
          </div>
          <div class="row">
              <div class="col-md-3">
                  <label>Initual:</label>
                  <input type="text" class="form-control" name="initual" id="initual">
              </div>
              <div class="col-md-3">
                  <label>Code:</label>
                  <input type="text" class="form-control" name="divcode" id="divcode">
              </div>
              <div class="col-md-6">
                  <label>Division Head:</label>
                  <input type="text" class="form-control" name="divhead" id="divhead">
                  <input type="hidden" name="divid" id="divid">
              </div>
          </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" id="divUpt" class="btn btn-outline-danger" data-dismiss="modal">Update</button>
            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
          </form>
          </div>   
      </div>
      </div>
  </div>

{{-- Registers Users --}}
<div class="modal fade bd-example-modal-lg" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">User Registartion</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
      <form class="form-group" method="post" action="{{url('users')}}" id="users_form" enctype="multipart/form-data" autocomplete="off">
                  @csrf
                  <fieldset>
                      <legend>Biodata</legend>
                      <div class="row">
                          <div class="col-md-4">
                              <label>Staff ID Number</label>
                              <input type="text" name="staffId" value="{{ old('staffId') }}" class="form-control{{ $errors->has('staffId') ? ' is-invalid' : '' }}" placeholder="AHC/000/00" required>
                              @if ($errors->has('staffId'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('staffId') }}</strong>
                              </span>
                              @endif
                          </div>
                          <div class="col-md-4">
                              <label>Firstname</label>
                              <input type="text" name="firstname" value="{{ old('firstname') }}" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" placeholder="Firstname" pattern="[a-zA-Z]{3,20}$" required>
                              @if ($errors->has('firstname'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('firstname') }}</strong>
                              </span>
                          @endif
                          </div>
                          <div class="col-md-4">
                              <label>Lastname</label>
                              <input type="text" name="lastname" value="{{ old('lastname') }}" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="Lastname" pattern="[a-zA-Z]{3,20}$" required>
                              @if ($errors->has('lastname'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('lastname') }}</strong>
                              </span>
                          @endif
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <label>Gender</label>
                              <br>
                              <input type="radio" name="gender" value="Female" >Female
                              <input type="radio" name="gender" value="Male" checked>Male
                          </div>
                          <div class="col-md-6">
                              <label>Email</label>
                              <input type="text" name="email" value="{{ old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="username@ahcul.com" required>
                              @if ($errors->has('email'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('email') }}</strong>
                              </span>
                              @endif
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <label>Mobile Phone</label>
                              <input type="text" name="mobilePhone" value="{{ old('mobilePhone') }}" class="form-control{{ $errors->has('mobilePhone') ? ' is-invalid' : '' }}" placeholder="0712345679" pattern="[0-9]{10}" required>
                              @if ($errors->has('mobilePhone'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('mobilePhone') }}</strong>
                              </span>
                              @endif
                          </div>
                          <div class="col-md-6">
                              <label>Office Phone</label>
                              <input type="text" name="officePhone" value="{{ old('officePhone') }}" class="form-control{{ $errors->has('officePhone') ? ' is-invalid' : '' }}" placeholder="0712345679" pattern="[0-9]{10}" required>
                              @if ($errors->has('officePhone'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('officePhone') }}</strong>
                              </span>
                              @endif
                          </div>
                      </div>
                  </fieldset>
                  <fieldset>
                      <legend>Login Information</legend>
                      <div class="form-group row">
                          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                              @if ($errors->has('password'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('password') }}</strong>
                              </span>
                              @endif
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                          <div class="col-md-6">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          </div>
                      </div>
                  </fieldset>
                  <fieldset>
                      <legend>Other Details</legend>
                      <div class="row">
                          <div class="col-md-3">
                              <label>Team</label>
                              <select name="team" value="{{ old('team') }}" class="form-control{{ $errors->has('team') ? ' is-invalid' : '' }}" required>                            
                              <option value="Administrators">Administrators</option>
                              </select>
                              @if ($errors->has('team'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('team') }}</strong>
                              </span>
                              @endif
                          </div>
                          <div class="col-md-9">
                              <label>Title</label>
                              <input type="text" name="title" value="{{ old('title') }}" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Designation" required>
                              @if ($errors->has('email'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('email') }}</strong>
                              </span>
                              @endif
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                              <label>Level / Role:</label>
                              <select name="role"  value="{{ old('role') }}" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" required>                            
                              <option value="Admin">Admin</option>
                              </select>
                              @if ($errors->has('role'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('role') }}</strong>
                              </span>
                              @endif
                          </div>
                          <div class="col-md-4">
                              <label>Reporting to</label>
                              <input list="reporting" name="reportsTo" value="{{ old('reportsTo') }}" class="form-control{{ $errors->has('reportsTo') ? ' is-invalid' : '' }}" onkeyup="assignStaff(this.value);">
                              <datalist id="reporting">                                   
                              </datalist>
                              @if ($errors->has('reportsTo'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('reportsTo') }}</strong>
                              </span>
                              @endif
                          </div>
                          <div class="col-md-4">
                              <label>Date joined</label>
                              <input type="date" name="datejoined" value="{{ old('datejoined') }}" class="form-control{{ $errors->has('datejoined') ? ' is-invalid' : '' }}" required>
                              @if ($errors->has('datejoined'))
                              <span class="invalid-feedback">
                              <strong>{{ $errors->first('datejoined') }}</strong>
                              </span>
                              @endif
                          </div>
                      </div>
                  <input type="hidden" name="user_status" value="Inactive">
              </fieldset>        
          </div>
          <div class="modal-footer">
              <input type="submit" name="submit" value="Save" class="btn btn-outline-danger">
              <input type="reset" class="btn  btn-outline-secondary" data-dismiss="modal" value="Cancel">
          </form>
          </div>
      </div>
  </div>
</div>

{{-- Public Holidays --}}
<div class="modal fade" id="publicDays" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Add public Holiday</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
      <form class="form-group" id="publicForm" autocomplete="off">
              @csrf
          <div class="row">
              <div class="col-md-12">
                  <label>Holiday Name:</label>
                  <input type="text" name="holiday" class="form-control">
              </div>
          </div>
          <div class="row">
              <div class="col-md-4">
                  <label>Month:</label>
                  <select type="text" name="holimonth" id="holimonth" class="form-control">
                      <option value="January">January</option>       
                      <option value="February">February</option>       
                      <option value="March">March</option>       
                      <option value="April">April</option>       
                      <option value="May">May</option>       
                      <option value="June">June</option>       
                      <option value="July">July</option>       
                      <option value="August">August</option>       
                      <option value="September">September</option>       
                      <option value="October">October</option>       
                      <option value="November">November</option>       
                      <option value="December">December</option>  
                  </select>
              </div>
              <div class="col-md-4">
                  <label>Date:</label>
                  <select type="text" name="holidate" id="holidate" class="form-control">
                      @foreach(range(1,31) as $day)
                          <option value="{{$day}}">{{$day}}</option>
                      @endforeach
                  </select>
              </div>
          </div>
      </form>
  </div>
  <div class="modal-footer">
    <button type="button" id="addPublic" class="btn btn-outline-danger">Save</button>
    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
  </div>
</div>
</div>
</div>

{{-- Update Public Holidays --}}
<div class="modal fade" id="editHolidays" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit public Holiday</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
      <form class="form-group" id="holeditForm" autocomplete="off">
          {{method_field('PUT')}}
              @csrf
          <div class="row">
              <div class="col-md-12">
                  <label>Holiday Name:</label>
                  <input type="text" id="holiday" class="form-control">
              </div>
          </div>
          <div class="row">
              <div class="col-md-4">
                  <label>Month:</label>
                  <input type="text" id="holimonths" class="form-control">
              </div>
              <div class="col-md-4">
                  <label>Date:</label>
                  <input type="text" id="holidates" class="form-control">
                  <input type="hidden" id="holid">
              </div>
          </div>
      </form>
  </div>
  <div class="modal-footer">
    <button type="button" id="holidayUp" class="btn btn-outline-danger">Update</button>
    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
  </div>
</div>
</div>
</div>
{{-- Service Lines --}}
<div class="modal fade" id="serviceLine" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Add Service Line</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
      <form class="form-group"  id="linesForm" autocomplete="off">
              @csrf
          <div class="row">
              <div class="col-md-12">
                  <label>Service line:</label>
                  <input type="text" name="servicename" class="form-control">
              </div>
          </div>
          <div class="row">
              <div class="col-md-4">
                  <label>Service Code:</label>
                  <input type="text" name="servicecode" class="form-control">
              </div>
              <div class="col-md-8">
                  <label>Description:</label>
                  <input type="text" name="servicedesc" class="form-control">
              </div>
          </div>
      </form>
  </div>
  <div class="modal-footer">
    <button type="button" id="linesBtn" class="btn btn-outline-danger">Save</button>
    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
  </div>
</div>
</div>
</div>

{{-- Update Service Lines --}}
<div class="modal fade" id="editServices" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit Service Line</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
      <form class="form-group"  id="servicesedit" autocomplete="off">
              @csrf
          <div class="row">
              <div class="col-md-12">
                  <label>Service line:</label>
                  <input type="text" id="servicename" class="form-control">
              </div>
          </div>
          <div class="row">
              <div class="col-md-4">
                  <label>Service Code:</label>
                  <input type="text" id="servicecode" class="form-control">
              </div>
              <div class="col-md-8">
                  <label>Description:</label>
                  <input type="text" id="servicedesc" class="form-control">
                  <input type="hidden" id="serviceid" class="form-control">
              </div>
          </div>
      </form>
  </div>
  <div class="modal-footer">
    <button type="button" id="serviceUp" class="btn btn-outline-danger">Update</button>
    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
  </div>
</div>
</div>
</div>

{{--Leave Request--}}

<div class="modal fade" id="addleave" tabindex="-1"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content" style="background-color:#fff;">
          <div class="modal-header text-center">
              <h4 class="modal-title " id="exampleModalLabel">Leave Request</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <span id="errors">
             
            </span>
              <form method="post" id="leaveForm" autocomplete="off" action="/leaves">
                  @csrf
                  <div class="row">
                      <div class="col-md-6">
                          <label>Leave Requested</label>
                          <select class="form-control form-control-sm" name="leaveType" id="leaveType">
                              <option  value="">- Select Request -</option>
                              <option  value="Annual Leave">Annual Leave</option>
                              <option  value="Compassionate Leave">Compassionate Leave</option>
                              <option  value="Sick Leave">Sick Leave</option>
                              <option  value="Maternity Leave">Maternity Leave</option>
                              <option  value="Paternity Leave">Paternity Leave</option>
                              <option  value="Study Leave">Study Leave</option>
                          </select>
                          @if($errors->has('leaveType'))
                                  <span class="text-danger">
                                    {{$errors->first('leaveType')}}
                                  </span>
                                @endif
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6"><label>Start Date</label>
                          <div class="input-group mb-3">
                          <input type="date" name="startdate" id="startdate" class="form-control form-control-sm" >
                          <div class="input-group-append">
                              <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"></i></span>
                          </div>
                          </div>
                          @if($errors->has('startdate'))
                          <span class="text-danger">
                            {{ $errors->first('startdate') }}
                            </span>
                             @endif
                      </div>
                      <div class="col-md-6">
                          <label>End Date</label>
                          <div class="input-group mb-3">
                              <input type="date" name="enddate" id="enddate" class="form-control form-control-sm" >
                              <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"></i></span>
                              </div>
                          </div>
                          @if($errors->has('enddate'))
                          <span class="text-danger">
                            {{ $errors->first('enddate') }}
                            </span>
                            @endif
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <label>Request Details</label>
                          <textarea type="text" name="leavedetail" id="leavedetail" class="form-control"></textarea>
                          <input type="hidden" name="status" value="Pending Approval">
                          @if($errors->has('leavedetail'))
                          <span class="text-danger">
                            {{ $errors->first('leavedetail') }}
                            </span>
                            @endif
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" id="leaveBtn" class="btn btn-outline-danger">Submit</button>
                    <button type="button" class="btn  btn-outline-secondary" data-dismiss="modal">Close</button>
                </div>
              </form>
          </div>
          
      </div>
  </div>
</div>

{{-- Leave Settings --}}
<div class="modal fade" id="leaveSetting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Leave Settings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-group" id="leaveSettingForm" autocomplete="off" action="leaves">
                  @csrf
              <div class="row">
                  <div class="col-md-6">
                      <label>Leave type:</label>
                     <select class="form-control" id="leaveTypes">
                          <option class="form-control" value="">- Select Request -</option>
                          <option class="form-control" value="Annual Leave">Annual Leave</option>
                          <option class="form-control" value="Compassionate Leave">Compassionate Leave</option>
                          <option class="form-control" value="Sick Leave">Sick Leave</option>
                          <option class="form-control" value="Maternity Leave">Maternity Leave</option>
                          <option class="form-control" value="Paternity Leave">Paternity Leave</option>
                          <option class="form-control" value="Study Leave">Study Leave</option>
                      </select>
                  </div>
                  <div class="col-md-3">
                      <label>Annual Lot:</label>
                      <input type="number" name="annual" class="form-control">
                  </div>
                  <div class="col-md-3">
                      <label>Bookable:</label>
                      <input type="number" name="bookable" class="form-control">
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <label>Description:</label>
                      <input type="text" name="description" class="form-control">
                  </div>
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="submit" id="leaveSettings" class="btn btn-outline-danger">Save</button>
        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        
      </div>
      
    </div>
  </div>
</div>

  @if($errors->count()>0)
  <script>
    $("#addleave").modal("show")
    </script>
  @endif

  <script>
    console.log({!! $errors !!})
  </script>
 

<script src="{{ asset('/js/calc.js')}}" ></script>
</body>
</html>