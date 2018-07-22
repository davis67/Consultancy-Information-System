@extends('layouts.app')
@section('content')
    <div class="card card-block">
        <div class="card-body">
            {{-- {{ var_dump($errors) }} --}}
            <div class="card-title row">
                    <div class="text col-md-4">
                        Create a User
                    </div>
                  
                  <div class=" col-md-8">
                      <a href="{{ route('users.index') }}" style="float:right" class="btn btn-outline-danger btn-sm pull-right"><i class="fa fa-fw fa-reply-all"></i>View All Users</a>
                    </div>
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
                            <select id="inputtitle" class="form-control form-control-sm {{ $errors->has('is_permitted') ? ' is-invalid' : '' }} form-control-sm" name="is_permitted">
                                <option value="">Choose...</option>
                                <option value=0>Consultant</option>
                                <option value=1>Manager</option>
                                <option value=2>Assistant Manager</option>
                                <option value=3>Director</option>
                                <option value=4>CEO</option>
                                <option value=5>Deputy Managing Director</option>
                                <option value=6>Chief Of Staffs</option>
                                <option value=7>Managing Director</option>
                              </select>     
                      </div>
                      <div class="form-group">
                        <label>EmployeeNo</label>
                        <input type="number" name="employeeNo" class="form-control form-control-sm">
                      </div>
                    <div class="form-group">
                        <label>Assigned to(Supervisor)</label>
                        <input type="text" name="reportsTo" class="form-control form-control-sm">
                      </div>
                    </div>
                </div>
                
                
              <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-danger">Add User</button>
                </div>
        </div>        
            </form>
        </div>
    </div>
@stop