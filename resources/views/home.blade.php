@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="row">
        <div class="col-md-7">
          <div class="card shadow">
            <div class="card-body">
                <h2 class="card-title text-center">Project Progress</h2>
              <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            Project
                          </th>
                          <th>
                            Project Manager
                          </th>
                          <th>
                            Due Date
                          </th>
                          <th>
                            Progress
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            May 15, 2019
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            2
                          </td>
                          <td>
                            Messsy Adam
                          </td>
                          <td>
                            Jul 01, 2019
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            3
                          </td>
                          <td>
                            John Richards
                          </td>
                          <td>
                            Apr 12, 2019
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            4
                          </td>
                          <td>
                            Peter Meggik
                          </td>
                          <td>
                            May 15, 2019
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            5
                          </td>
                          <td>
                            Edward
                          </td>
                          <td>
                            May 03, 2019
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            5
                          </td>
                          <td>
                            Ronald
                          </td>
                          <td>
                            Jun 05, 2019
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>  
        </div>
        <div class="col-md-5">
          <div class="card shadow">
          
            <div class="card-body"  style="height:420px; overflow-y:scroll;">
                <div class="card-title row">
                    <div class="text col-md-6">
                        Opportunity<span style="border-radius:50%;" class="badge badge-danger">{{ $opportunities->count() }}</span></span>
                    </div>
                  
                  <div class=" col-md-6">
                      <a href="{{ route('opportunities.index') }}" style="float:right" class="btn btn-outline-danger btn-sm pull-right"><i class="fa fa-fw fa-reply-all"></i>Add</a>
                    </div>
                   </div>
                <div class="">
                 @foreach($activities as $activity)
                    <p>{{ $activity->user->name }} {{ $activity->type  }} on {{ $activity->created_at->diffForHumans() }}</p>  
                    
                 @endforeach
                 <a href="" class="btn btn-outline-danger btn-xs">Read More..</a>

                 
                </div>
                
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-6">
          <div class="card shadow">
          <div class="card-header text-center">
              My opportunities
            </div>
            <div class="card-body"  style="height:350px; overflow-y:scroll;">
              @foreach ($doneopportunities as $opportunity)
              <p> You were assigned this {{ $opportunity->opportunity_name }} with <b><i>0M-{{ $opportunity->OM_number }}-AH</i></b> on {{ $opportunity->created_at }}</p>

                @if(strlen(strip_tags($opportunity->opportunity_name)) <= 6)
              <a href="" class="btn btn-outline-danger">Read More..</a>
                @endif
                 @endforeach
            </div>
          </div>  
        </div>
        <div class="col-md-6">
          <div class="card shadow">
              <div class="card-header text-center">
                My Tasks
              </div>
            <div class="card-body" style="height:350px; overflow-y:scroll;">
              @if($donetasks->count() > 0)
                @foreach ($donetasks as $task)
                <p> You were assigned this {{ $task->task_name }} on {{ $task->created_at }}</p>
             @endforeach
             @else
             <p><i>No Tasks done so far</i></p>
             @endif
            </div>
          </div>
        </div>
      </div>
<br>
    <div class="row">
          </div>
                </div>
            </div>
@endsection
