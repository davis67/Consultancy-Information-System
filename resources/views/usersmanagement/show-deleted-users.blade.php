@extends('layouts.app')

@section('template_title')
    Showing Deleted Users
@endsection

@section('template_linked_css')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }
        .users-table tr td:first-child {
            padding-left: 15px;
        }
        .users-table tr td:last-child {
            padding-right: 15px;
        }
        .users-table.table-responsive,
        .users-table.table-responsive table {
            margin-bottom: .15em;
        }

    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                Showing Deleted Users
                            </span>
                            <div class="float-right">
                                <a style="margin-bottom: 40px;" href="{{ route('users') }}" class="btn btn-outline-danger btn-sm float-right" data-toggle="tooltip" data-placement="left" title="Back to users">
                                    <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                                   Back to users
                                </a>
                            </div>
                        </div>

                        @if(count($users) === 0)

                            <tr>
                                <p class="text-center margin-half">
                                    No Records Found
                                </p>
                            </tr>

                        @else

                            <div class="table-responsive users-table">
                                <table class="table table-striped example table-sm data-table">

                                    <thead>
                                        <tr>
                                            <th class="hidden-xxs">ID</th>
                                            <th>Username</th>
                                            <th class="hidden-xs hidden-sm">Email</th>
                                            <th class="hidden-xs hidden-sm hidden-md">First Name</th>
                                            <th class="hidden-xs hidden-sm hidden-md">Last Name</th>
                                            <th class="hidden-xs hidden-sm">Role</th>
                                            <th class="hidden-xs">Deleted</th>
                                            <th class="hidden-xs">Deleted IP</th>
                                            <th>Actions</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($users as $user)
                                            <tr>
                                                <td class="hidden-xxs">{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td class="hidden-xs hidden-sm"><a href="mailto:{{ $user->email }}" title="email {{ $user->email }}">{{ $user->email }}</a></td>
                                                <td class="hidden-xs hidden-sm hidden-md">{{$user->first_name}}</td>
                                                <td class="hidden-xs hidden-sm hidden-md">{{$user->last_name}}</td>
                                                <td class="hidden-xs hidden-sm">
                                                    @foreach ($user->roles as $user_role)

                                                        @if ($user_role->name == 'User')
                                                            @php $labelClass = 'primary' @endphp

                                                        @elseif ($user_role->name == 'Admin')
                                                            @php $labelClass = 'warning' @endphp

                                                        @elseif ($user_role->name == 'Unverified')
                                                            @php $labelClass = 'danger' @endphp

                                                        @else
                                                            @php $labelClass = 'default' @endphp

                                                        @endif

                                                        <span class="label label-{{$labelClass}}">{{ $user_role->name }}</span>

                                                    @endforeach
                                                </td>
                                                <td class="hidden-xs">{{$user->deleted_at}}</td>
                                                <td class="hidden-xs">{{$user->deleted_ip_address}}</td>
                                                <td>
                                                    {!! Form::model($user, array('action' => array('SoftDeletesController@update', $user->id), 'method' => 'PUT', 'data-toggle' => 'tooltip')) !!}
                                                        {!! Form::button('<i class="fa fa-refresh" aria-hidden="true"></i>', array('class' => 'btn btn-outline-success btn-block btn-sm', 'type' => 'submit', 'data-toggle' => 'tooltip', 'title' => 'Restore User')) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-outline-info btn-block" href="{{ URL::to('users/deleted/' . $user->id) }}" data-toggle="tooltip" title="Show User">
                                                        <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                <form action="{{ route('deletes.destroy', $user->id)}}" method="post">
                                                    @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <div class="btn-group">
                                                        <button type="submit" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" onclick="return confirm('Are you sure?.THe user will be completely deleted')" title="completely delete a user"><i class="fa fa-trash"></i></button>
                                                        </div>
                                            </form>
                                            </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('footer_scripts')

    @if (count($users) > 10)
        @include('scripts.datatables')
    @endif
    @include('scripts.tooltips')

@endsection
