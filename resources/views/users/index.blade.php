@extends('layouts.app')
@section('content')
	<div class="card d-flex">
		<div class="card-body ">
			<h4 class="">Showing all Users</h4>
			<div style="float:right; margin-bottom:20px;">
			<a href="{{ route('users.create')}}" class="btn btn-sm btn-outline-danger">+create a User</a>
			</div>
			<div class="table-responsive">
			<table class="table example">
			<thead>
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Team</th>
				<th>Title</th>
				<th>Role</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			@if($users->count() > 0)
				@foreach($users as $user)
					<tr>
						<td>
							<img src="{{ $user->profile->avatar }}" width ="60px" height="60px" style="border-radius:50px" alt="">
						</td>
						<td>
							{{ $user->name }}
						</td>
						<td>{{ $user->team }}</td>
						<td>
							@if($user->is_permitted== 7)
							  <i> Managing Director</i>
							@elseif($user->is_permitted== 6)
							   CEO
							@elseif($user->is_permitted== 5)
								Deputy Managing Director
							@elseif($user->is_permitted== 4)
								<i>Chief Of Staffs</i>
							@elseif($user->is_permitted== 3)
								Director
							@elseif($user->is_permitted== 2)
								Assistant Manager
							@elseif($user->is_permitted== 1)
								Manager
							@else
								<i>Consultant</i>
							@endif
						</td>
						<td>
							@if($user->admin)
								<a href="{{ route('users.not.admin',['id' => $user->id]) }}" class="btn btn-xs btn-danger">Admin</a>
							@else
								<a href="{{ route('users.admin',['id' => $user->id]) }}" class="btn btn-xs btn-success">User</a>
							@endif
						</td>
						<td>
							Delete
						</td>

					</tr>
				@endforeach
			@else
				<tr>
					<th colspan="5" class="text-center">No users registered</th>
				</tr>
			@endif
		</tbody>
	</table>
			</div>
		</div>
	
@endsection