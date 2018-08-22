@extends('layouts.app')

@section('template_title')
Showing User {{ $user->name}}
@endsection

@php
  $levelAmount ='Level';
  if ($user->level() >= 2) {
    $levelAmount = 'Levels';
  }
@endphp

@section('content')


        <div class="card">

          <div class="card-body">
           
           
            <div class="row">
              <div style="margin-top:50px; padding:30px;" class="col-md-6">
              <p>Personal Details..</p>
              <hr/>
                    <div style="margin-bottom:15px;"> <b>First Name: </b> {{ $user->first_name }}</div>
                    <div style="margin-bottom:15px;"><b> Last Name: </b> {{ $user->last_name }}</div>
                    <p>Organisation Details..</p>
                    <hr/>    
                    <div style="margin-bottom:15px;"> <b>Team: </b> {{ $user->team }}</div>
                    <div style="margin-bottom:15px;"><b> Employee No: </b> {{ $user->employee_no }}</div>
                    <span style="margin-bottom:15px;"><b> Email: </b></span>
                    <div style="margin-bottom:15px;" class="text-danger">{{ $user->email }}</div>

                    <p>Last leave taken..</p>
                    <hr/>
                    </div>           
                   
              <div style="margin-top:50px;" class="col-md-6">
               <h5 class="text-danger">Change Password</h5>
               <div style="border:1px solid #FF8897; padding:20px;">
                @include('pages.changepassword')
               </div>
              </div>
            </div>
            <div style="argin-top:50px;">
              <a href="" class="btn btn-outline-danger">view Profile</a>
            </div>
            </div>

           

          </div>

        </div>
    



@endsection

@section('footer_scripts')
  @if(config('usersmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection
