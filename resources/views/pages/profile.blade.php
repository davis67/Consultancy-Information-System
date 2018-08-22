<!-- Extend Main layout -->

@extends('layouts.app')

<!-- Add Custom content Section-->

    @section('content')
    <div class="row">
        <div class="col-md-8">
          {{-- <div class="row">
              <div class="col-md-12">
                  <div class="card shadow">
                      <div class="card-header">
                        <h5>Meats</h5>
                      </div>
                      <div class="card-body" id="groupsBody">
                        @if(count($meats)>0)
                          <table class="table table-sm  table-hover dat">
                            <thead>
                                <tr>
                                <th scope="col">Options</th>
                                <th scope="col">Date</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Beneficiary</th>
                                <th scope="col">OM Number</th>
                                <th scope="col">Service Line</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($meats as $meat)
                                <tr>
                                  <td>
                                      <span class='fa fa-edit editMeat' id="{{$meat->id}}" title="Edit Meat"></span>
                                      <span class='fa fa-trash text-danger  delMeat' id="{{$meat->id}}" title="Delete Meat"></span>
                                  </td>
                                  <td>{{$meat->activityDate}}</td>
                                  <td>{{$meat->duration}} Hours</td>
                                  <td>{{$meat->beneficiary}}</td>
                                  <td>{{$meat->OMNumber}}</td>
                                  <td>{{$meat->serviceline}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
                        @else
                        <h4>No records found</h4>
                        @endif
                      </div>
                    </div>
                  </div>
              </div>
              <br> --}}
          <div class="row">
              <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-header">
                      <h5>Leave Requests</h5>
                    </div>
                    <div class="card-body" id="groupsBody">
                      @if(count($leaves)>0)
                          <table class="table table-sm dat">
                          <thead>
                              <tr>
                              <th scope="col">Leave Type</th>
                              <th scope="col">Starting</th>
                              <th scope="col">Ending</th>
                              <th scope="col">Duration</th>
                              <th scope="col">Status</th>
                              <th scope="col">Modified</th>
                              <th scope="col"></th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach($leaves as $leave)
                              <tr>
                                <td>{{$leave->leaveType}}</td>
                                <td>{{$leave->startdate}}</td>
                                <td>{{$leave->enddate}}</td>
                                <td>{{$leave->duration}} Days</td>
                                <td>{{$leave->status}}</td>
                                <td>{{$leave->startdate}}</td>
                                <td>
                                  <span class='fa fa-edit text-primary editLeave' id="{{$leave->id}}" title="Edit Leave"></span>
                                  <span class='fas fa-times text-danger delLeve' id="{{$leave->id}}" title="Cancel Leave"></span>
                                </td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                      @else
                      <h4>No records found</h4>
                      @endif
                    </div>
                  </div>
                </div>
          </div>
        </div>

        <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-danger text-white">
                        <strong>Leave Summary</strong>
                        <button class="btn btn-light btn-sm" style="float:right;" data-toggle="modal" data-target="#addleave">Request <i class="far fa-calendar-plus" aria-hidden="true"></i></button>  
                    </div>
                  <div class="card-body">
                    <table class="table table-sm">
                      <tr><td><b>Leave Type</b></td><td><b>Annual</b></td><td><b>Booked</b></td></tr>
                      <tr><td>Carried forward to {{date('Y')}}</td><td><b>12</b></td><td><b>12</b></td></tr>
                      <tr><td>Annual Leave</td><td><b>12</b></td><td><b>12</b></td></tr>
                      <tr><td>Study Leave</td><td><b>12</b></td><td><b>12</b></td></tr>
                      <tr><td>Sick Leave</td><td><b>12</b></td><td><b>12</b></td></tr>
                      @if(Auth::user()->gender =='Female')
                      <tr><td>Maternity Leave</td><td><b>12</b></td><td><b>12</b></td></tr>
                      @else
                      <tr><td>Paternity Leave</td><td><b>12</b></td><td><b>12</b></td></tr>
                      @endif
                      <tr><td>Compassionate Leave</td><td><b>12</b></td><td><b>12</b></td></tr>
                    </table>
            </div>
          </div>
        </div>
          </div>
        </div>
          </div>
        </div>
      </div>
<!-- End of page content -->
    @endsection

<!-- Add Custom Page content -->