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

            <div class="row">
              <div class="col-sm-4 col-md-6">
                <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                  {{ $user->name }}
                </h4>
                <p class="text-center text-left-tablet">
                  <strong>
                    {{ $user->first_name }} {{ $user->last_name }}
                  </strong>
                  @if($user->email)
                    <br />
                    <span class="text-center" data-toggle="Email {{ $user->email}}">
                      {{ Html::mailto($user->email, $user->email) }}
                    </span>
                  @endif
                </p>
                @if ($user->profile)
                    </a>
                    <a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit User">
                      <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> Edit User</span>
                    </a>
                  </div>
                @endif
              </div>
            </div>

            @if ($user->name)

              <div class="col-sm-5 col-6 text-larger">
                Username
              </div>

              <div class="col-sm-7">
                {{ $user->name }}
              </div>

            @endif

            @if ($user->email)

            <div class="col-sm-5 col-6 text-larger">
              <strong>
               Email
              </strong>
            </div>

            <div class="col-sm-7">
              <span data-toggle="tooltip" data-placement="top" title="@lang('usersmanagement.tooltips.email-user', ['user' => $user->email])">
                {{ HTML::mailto($user->email, $user->email) }}
              </span>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @endif

            @if ($user->first_name)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  First Name
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $user->first_name }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($user->last_name)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Last Name
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $user->last_name }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Role
              </strong>
            </div>

            <div class="col-sm-7">
              @foreach ($user->roles as $user_role)

                @if ($user_role->name == 'User')
                  @php $badgeClass = 'primary' @endphp

                @elseif ($user_role->name == 'Admin')
                  @php $badgeClass = 'warning' @endphp

                @elseif ($user_role->name == 'Unverified')
                  @php $badgeClass = 'danger' @endphp

                @else
                  @php $badgeClass = 'default' @endphp

                @endif

                <span class="badge badge-{{$badgeClass}}">{{ $user_role->name }}</span>

              @endforeach
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
               Status
              </strong>
            </div>

            <div class="col-sm-7">
              @if ($user->activated == 1)
                <span class="badge badge-success">
                  Activated
                </span>
              @else
                <span class="badge badge-danger">
                  Not-Activated
                </span>
              @endif
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Level Amount {{ $levelAmount }}:
              </strong>
            </div>

            <div class="col-sm-7">

              @if($user->level() >= 5)
                <span class="badge badge-primary margin-half margin-left-0">5</span>
              @endif

              @if($user->level() >= 4)
                 <span class="badge badge-info margin-half margin-left-0">4</span>
              @endif

              @if($user->level() >= 3)
                <span class="badge badge-success margin-half margin-left-0">3</span>
              @endif

              @if($user->level() >= 2)
                <span class="badge badge-warning margin-half margin-left-0">2</span>
              @endif

              @if($user->level() >= 1)
                <span class="badge badge-default margin-half margin-left-0">1</span>
              @endif

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Permission
              </strong>
            </div>

            <div class="col-sm-7">
              @if($user->canViewUsers())
                <span class="badge badge-primary margin-half margin-left-0">
                 View
                </span>
              @endif

              @if($user->canCreateUsers())
                <span class="badge badge-info margin-half margin-left-0">
                  Create
                </span>
              @endif

              @if($user->canEditUsers())
                <span class="badge badge-warning margin-half margin-left-0">
                 Edit
                </span>
              @endif

              @if($user->canDeleteUsers())
                <span class="badge badge-danger margin-half margin-left-0">
                  Delete
                </span>
              @endif
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @if ($user->created_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Created At
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $user->created_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($user->updated_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                 Updated At
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $user->updated_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($user->signup_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                 Sign up Ip Address
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $user->signup_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($user->signup_confirmation_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                Ip Confirmation Address
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $user->signup_confirmation_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($user->admin_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Admin IP Address
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $user->admin_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($user->updated_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Updated Ip Address
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $user->updated_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

          </div>

        </div>
    



@endsection

@section('footer_scripts')
  @if(config('usersmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection
