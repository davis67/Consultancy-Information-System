@extends('layouts.app')
@section('content')
        <div class="page-header">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Documents</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Documents</li>
              </ol>
            </nav>
            <h3 class="page-title">
             {{--  <span class="page-title-icon bg-gradient-danger text-white mr-2">
                <i class="mdi mdi-folder-outline"></i>                 
              </span> --}}
              <a class="btn btn-sm btn-gradient-danger mt-2" href="{{ route('opportunities.create') }}">+Create Document</a>
            </h3>
          </div>
          <div class="row">
          	<div class="col-lg-12 grid-margin stretch-card">
          	<div class="card">
			
			<div class="card-body">
				<div class="card-title">
				Showing all Documents
			   </div>
				<table class="table example" >
					<thead>
						<tr>
							<th>Document Name</th>
							<th>Status</th>
							<th>Revision</th>
							<th>Publish Date</th>
							<th>Expiry Date</th>
							<th>Team</th>
							<th>Assigned To</th>
							<th>Options</th>
						</tr>
					</thead>
					<tbody>
						
							@foreach($documents as $document)
							<tr>
							<td>{{$document->document_name}}</td>
							<td>{{$document->status}}</td>
							<td>{{$document->revision}}</td>
							<td>{{$document->publish_date}}</td>
							<td>{{$document->expiry_date}}</td>
							<td>{{$document->team}}</td>
							<td>{{$document->assigned_to}}</td>
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