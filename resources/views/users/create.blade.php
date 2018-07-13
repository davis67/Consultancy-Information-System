@extends('layouts.app')
@section('content')
    <div class="card card-block">
        <div class="card-body">
        	<h3 class="">create a new User</h3>
			<div >
			<a href="{{ route('users')}}" class="btn btn-sm btn-outline-danger pull-right">View All Users</a>
			</div>
            <form action="{{route('users.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputTeam">Team </label>
                            <select id="inputTeam" class="form-control {{ $errors->has('team') ? ' is-invalid' : '' }} form-control-sm" name="team">
                                <option value="">Choose...</option>
                                @foreach(App\Team::names() as  $team)
                                <option value="{{$team}}">{{$team}}</option>
                                @endforeach
                              </select>     
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputTeam">Title </label>
                            <select id="inputtitle" class="form-control form-control-sm {{ $errors->has('title') ? ' is-invalid' : '' }} form-control-sm" name="title">
                                <option value="">Choose...</option>
                                @foreach($usergroups as  $usergroup)
                                <option value="{{$usergroup->name}}">{{$usergroup->name}}</option>
                                @endforeach
                              </select>     
                      </div>
                      <div class="form-group">
                        <label>EmployeeNo</label>
                        <input type="text" name="employeeNo" class="form-control form-control-sm">
                      </div>
                    <div class="form-group">
                        <label>Assigned to</label>
                        <input type="text" name="assigned_to" class="form-control form-control-sm">
                      </div>
                    </div>
                </div>
                </div>
                
              <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-success">Add User</button>
                </div>
        </div>        
            </form>
        </div>
    </div>
@stop