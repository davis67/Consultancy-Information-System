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
            <div style="display: flex; justify-content: space-between; align-items: center;">
            <h3> {{  $user->name}}'s Information </h3>
              <div class="float-right">
                <a href="{{ route('users') }}" class="btn btn-outline-danger btn-sm float-right" data-toggle="tooltip" data-placement="left" title="Back to users">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  Back to Users
                </a>
              </div>
              </div>
              <div class="text-center">
                My profile
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                      <img src="/uploads/avatr.jpeg" style="width:150px; height:120px; border-radius:50%;" alt="image">
                      <span class="availability-status online"></span>
                  </div>  
                      <div class="col-md-5">
                          <div style="margin-bottom:15px;"> <b>First Name: </b> {{ $user->first_name }}</div>
                          <div style="margin-bottom:15px;"><b> Last Name: </b> {{ $user->last_name }}</div>
                          <span><b> Email: </b></span>
                          <div  class="text-danger">{{ $user->email }}</div>
                          </div>           
                    </div>
              </div>
            </div>
              <div class="col-md-6">
                 
              </div>
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
