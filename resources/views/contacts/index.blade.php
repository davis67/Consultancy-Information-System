@extends('layouts.app')
@section('content')

          <div class="row">
          	<div class="col-lg-12 grid-margin stretch-card">
          	<div class="card">
			
			<div class="card-body">
					<div class="card-title row">
							<div class="text col-md-4">
								Showing all Contacts
							</div>
						
						<div class=" col-md-8">
								<a href="{{ route('contacts.create') }}" style="float:right" class="btn btn-outline-danger btn-sm pull-right"><i class="fa fa-fw fa-reply-all"></i>Create a Contact</a>
							</div>
						 </div>
				<table class="table example" >
					<thead>
						<tr>
							<th>Name</th>
							<th>Telephone No</th>
							<th>Client Name</th>
							<th>Job Title</th>
							<th>email</th>
							<th>Address</th>
							<th>Options</th>
						</tr>
					</thead>
					<tbody>
						
							@foreach($contacts as $contact)
							<tr>
							<td>{{$contact->title}} {{ $contact->first_name}} {{ $contact->last_name}}</td>
							<td>{{$contact->mobile_telephone}}</td>
							<td>{{$contact->client_name}}</td>
							<td>{{$contact->job_title}}</td>
							<td>{{$contact->email}}</td>
							<td>{{$contact->address_street}}<br/>{{$contact->address_code}}<br/>{{$contact->address_state}}<br/>{{$contact->country}}</td>
							<td>
							<form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
									@csrf
								<input name="_method" type="hidden" value="DELETE">
								<div class="btn-group">
										<a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-outline-danger btn-xs"><i class="fa fa-eye"></i></a>
										<a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-outline-danger btn-xs"><i class="fa fa-edit"></i></a>
										<button type="submit" class="btn btn-outline-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
										</div>
							</form>
						</td>
							</tr>
							@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
          	</div>
          	
          </div>
		
</div>
@endSection