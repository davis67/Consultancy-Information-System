@extends('layouts.app')

@section('template_title')
Editing User{{  $user->name}}'s information'
@endsection

@section('template_linked_css')
    <style type="text/css">
        .btn-save,
        .pw-change-container {
            display: none;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-between; align-items: center; font-size:20px;">
                            <span ><b>{{$user->name}}'s information</b></span>
                            <div class="pull-right">
                                <a href="{{ route('users') }}" style="margin:20px;" class="btn btn-outline-danger btn-sm float-right" data-toggle="tooltip" data-placement="top" title="Back to all users">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                   Back to User
                                </a>
                                <a href="{{ url('/users/' . $user->id) }}" style="margin:20px;" class="btn btn-outline-danger btn-sm float-right" data-toggle="tooltip" data-placement="left" title="Back to all users">
                                    <i class="fa fa-fw fa-reply" aria-hidden="true"></i>
                                   Backs to Users
                                </a>
                            </div>
                        </div>
                        <div style="border:1px solid #333; padding:20px;">
                           <div class="text-danger"> NOTE</div>
                           <span>To change an email and the role, contact the management other wise you are sorted..</span>
                           <br/>
                           <span>To change your password, visit your profile...<a href="" class="btn btn-xs btn-outline-danger">Profile</a></span>
                    </div>
                        <div style="margin-top:40px;".
                        {{-- {!! Form::open(array('route' => ['users.update', $user->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation')) !!} --}}
                        <form method="post" class="needs-validation" action="{{ route('users.update',  $user->id) }}">
                            @csrf

                            <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                                    <label class="col-md-3 control-label">User Name:</label>

                                <div class="col-md-9">
                                    <div class="input-group">
                                            <input type="text" class="form-control" id="name" value="{{ $user->name }}"/>
                                            <div class="input-group-append">
                                            <label class="input-group-text" for="name">
                                                <i class="fa fa-fw fa-user" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('first_name') ? ' has-error ' : '' }}">
                                    <label class="col-md-3 control-label">First Name:</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="first_name" value="{{ $user->first_name }}"/>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="first_name">
                                                <i class="fa fa-fw fa-user" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('last_name') ? ' has-error ' : '' }}">
                            
                                <label class="col-md-3 control-label">Last Name:</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="last_name" value="{{ $user->last_name }}"/>

                                        <div class="input-group-append">
                                            <label class="input-group-text" for="last_name">
                                                <i class="fa fa-fw fa-name" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('last_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('email') ? ' has-error ' : '' }}">
                                <label role="email" class="col-md-3 control-label"> Email</label>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="email" value="{{ $user->email }}"/>
                                        <div class="input-group-append">
                                            <label for="email" class="input-group-text">
                                                <i class="fa fa-fw fa-send" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('role') ? ' has-error ' : '' }}">

                                <label role="role" class="col-md-3 control-label"> Roles</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select class="custom-select form-control" name="role" id="role">
                                            <option value="">Select User Role</option>
                                            @if ($roles)
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" {{ $currentRole->id == $role->id ? 'selected="selected"' : '' }}>{{ $role->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="role">
                                                <i class="fa fa-fw fa-shield" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('role'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <button type="submit" class="btn btn-outline-success margin-bottom-1 mt-3 mb-2 " onclick="return confirm('Are you sure?'): false;"><i class="fa fa-add">Update</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
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
  {{-- @include('scripts.check-changed') --}}
@endsection
