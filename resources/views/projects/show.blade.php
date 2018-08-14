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
            <ul >
                    <li style="list-style:none;">
                      <a class="nav-link text-dark" style="text-decoration:none;" data-toggle="collapse" href="#re{{ $task->id }}" aria-expanded="false" aria-controls="re{{ $task->id }}">
                      <i class="fa fa-caret-right"></i>
                        <span class="menu-title">{{ $task->task_title }}</span>
                      </a>
                      <div class="collapse" id="re{{ $task->id }}">
                        <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> 
                            
                                    @foreach (App\Task::find($task->id)->subtasks as $subtask)
                                    <div class="row">
                                        <div class="col-md-8">
                                                <p class="nav-link" href="">
                                                        <i class="fa fa-arrow-right"></i> 
                                                    {{ $subtask->task_title }}
                                                </p>
                                        </div>
                                        <div class="col-md-4" style="float:right">
                                                @if($subtask->isComplete == 0)
                                                  <a class="btn btn-xs btn-outline-success">  pending</a>
                                                @else
                                              
                                                <a class="btn btn-xs btn-outline-danger">completed</a>

                                                @endif
                                            </div>
                                    </div>
                                    
                                    @endforeach
                           
                          </li>

                        </ul>
                      </div>
                    </li>
            </ul>
            @endforeach
        </div>
    </div>
</div>
@endSection
