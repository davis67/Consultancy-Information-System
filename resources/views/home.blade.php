@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="row">
        <div class="col-md-7">
          <div class="card shadow">
            <div class="card-body">
                <h2 class="card-title">Project Progress</h2>
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
          
            <div class="card-body">
                <div class="">
                <span class="card-title">Opportunities<span style="border-radius:50%;" class="badge badge-danger">{{ $opportunities->count() }}</span></span>
                <span class="btn btn-outline-danger btn-sm" style="float: right">+ Add</span>
                </div>
                <div class="">
                 no opportunities   
                </div>
                
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-4">
          <div class="card shadow">
          <div class="card-header">
              My opportunities
            </div>
            <div class="card-body">
            </div>
          </div>  
        </div>
        <div class="col-md-4">
          <div class="card shadow">
              <div class="card-header">
                My Projects
              </div>
            <div class="card-body">

            </div>
          </div>
        </div>
              <div class="col-md-4">
          <div class="card shadow">
              <div class="card-header">
                Who is on leave
              </div>
            <div class="card-body">

            </div>
          </div>
        </div>
      </div>
<br>
      <div class="row">
        <div class="col-md-6">
          <div class="card shadow">
            <div class="card-header">
              Competitor Scores
            </div>
            <div class="card-body">
             <canvas id="visit-sale-chart" class="mt-4"></canvas>
            </div>
          </div>  
        </div>
        <div class="col-md-6">
          <div class="card shadow">
          <div class="card-header">
              Opportunity History
            </div>
            <div class="card-body">
            <canvas id="secondchart"></canvas>
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
