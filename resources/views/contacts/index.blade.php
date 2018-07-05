@extends('layouts.app')
@section('content')
        <div class="page-header">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Contacts</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Contacts</li>
              </ol>
            </nav>
            <h3 class="page-title">
             {{--  <span class="page-title-icon bg-gradient-danger text-white mr-2">
                <i class="mdi mdi-folder-outline"></i>                 
              </span> --}}
              <a class="btn btn-sm btn-gradient-danger mt-2" href="{{ route('opportunities.create') }}">+Create Contact</a>
            </h3>
          </div>
          <div class="row">
          	<div class="col-lg-12 grid-margin stretch-card">
          	<div class="card">
			
			<div class="card-body">
				<div class="card-title">
				Showing all Contacts
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
							<a href="" style="color: 000000;"><i class="mdi mdi-file-check md-18 text-dark" style="font-size: 25px;"></i></a>
							<a href="" style="color: 000000;"><i class="mdi mdi-delete text-dark" style="font-size: 25px;"></i></a>
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