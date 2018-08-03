@extends('layouts.app')

@section('template_title')
        Create New Team
@endsection

@section('template_fastload_css')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom:40px;">
                            <a href="{{ route('users.create') }}" class="btn btn-outline-primary btn-sm"><i class="fa fa-plus"></i>Add  a User</a>
                            <div class="pull-right">
                                <a href="{{ route('users') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="Back to users">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    <span class="hidden-sm hidden-xs">Back to </span><span class="hidden-xs">Users</span>
                                </a>
                            </div>
                        </div>
                        {!! Form::open(array('route' => 'teams.store', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}

                            @csrf
                            <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                                {!! Form::label('team', 'Team', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('team', NULL, array('id' => 'team', 'class' => 'form-control', 'placeholder' => 'create a team')) !!}

                                    </div>
                                    @if ($errors->has('team'))
                                        <span class="help-block text-danger">
                                        {{ $errors->first('team') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('team_description') ? ' has-error ' : '' }}">
                                {!! Form::label('team_description', 'Team description', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('team_description', NULL, array('id' => 'team_description', 'class' => 'form-control', 'placeholder' => 'team description')) !!}
                                    </div>
                                    @if ($errors->has('team_description'))
                                        <span class="help-block text-danger">
                                            {{ $errors->first('team_description') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('team_leader') ? ' has-error ' : '' }}">
                                {!! Form::label('team_leader', 'Team Leader', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('team_leader', NULL, array('id' => 'team_leader', 'class' => 'form-control', 'placeholder' => 'Team leader')) !!}
                                        
                                    </div>
                                    @if ($errors->has('team_leader'))
                                        <span class="help-block text-danger">
                                          {{ $errors->first('level') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {!! Form::button('Create New Team', array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')

@endsection
