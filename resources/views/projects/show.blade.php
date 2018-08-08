@extends('layouts.app')
@section('content')
<div class="row">
     <div class="col-md-4">
    <div class="card">
        <div class="card-body">
         <div class="text-center">Project Description</div>
         @if($project->description)
         <div>{{ $project->description }}</div>
         @else
         <div class="text-center" style="font-size:10px; margin-top:20px;">No Description</div>
         @endif
	
    <div class="card">
            <div class="card-body">
             <div>Total Consultants:</div>
                <hr>
             <div>Associates:</div>
             <hr>
             <div>OM Number:</div>
             <hr>
             <div >Start Date:</div>
             <hr>
             <div>End Date:</div>
                <hr>
             <div>Reamining Time:</div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <h4 class="text-center">Project Tasks</h4>
            @foreach ($tasks as $task )
                <p>{{ $task->task_title }}</p>
            @endforeach
            <ul >
                    <li>
                      <a class="nav-link" data-toggle="collapse" href="#re" aria-expanded="false" aria-controls="re">
                      <i class="fa fa-caret-right"></i>
                        <span class="menu-title">Opportunities</span>
                      </a>
                      <div class="collapse" id="re">
                        <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> 
                            <a class="nav-link" href="{{ route('opportunities.create') }}">
                                    <i class="fa fa-arrow-right"></i> Create Opportunity
                            </a>
                          </li>
                          <li class="nav-item">
                           <a class="nav-link" href="{{ route('opportunities.index') }}">
                                <i class="fa fa-arrow-right"></i>  View Opportunity
                           </a>
                         </li>
                        </ul>
                      </div>
                    </li>
            </ul>
        </div>
    </div>
</div>
@endSection
