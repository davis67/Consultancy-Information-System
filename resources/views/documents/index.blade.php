@extends('layouts.app')
@section('content')
        {{-- <div class="page-header">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Documents</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Documents</li>
              </ol>
            </nav>
            <h3 class="page-title">
         <span class="page-title-icon bg-gradient-danger text-white mr-2">
                <i class="mdi mdi-folder-outline"></i>                 
              </span> 
              <a class="btn btn-sm btn-gradient-danger mt-2" href="{{ route('opportunities.create') }}">+Create Document</a>
            </h3>
          </div> --}}
          <div class="row">
          	<div class="col-lg-12 grid-margin stretch-card">
          	<div class="card">
			
			<div class="card-body">
					<div class="card-title row">
							<div class="text col-md-4">
									Showing all Documents
							</div>
						
						<div class=" col-md-8">
								<a href="{{ route('documents.create') }}" style="float:right" class="btn btn-outline-danger btn-sm pull-right"><i class="fa fa-fw fa-reply-all"></i>Create Document</a>
							</div>
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
							<form action="{{ route('documents.destroy', $document->id)}}" method="post">
									@csrf
								<input name="_method" type="hidden" value="DELETE">
								<div class="btn-group">
										<a href="{{ route('documents.edit', $document->id) }}" class="btn btn-outline-danger btn-xs"><i class="fa fa-eye"></i></a>
										<a href="{{ route('documents.edit', $document->id) }}" class="btn btn-outline-danger btn-xs"><i class="fa fa-edit"></i></a>
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