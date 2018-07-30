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
							<th>Size</th>
							<th>Publish Date</th>
							<th>Expiry Date</th>
							<th>Category</th>
							<th>Options</th>
						</tr>
					</thead>
					<tbody>
						
							@foreach($files as $file)
							<tr>
							<td>{{$file->title}}</td>
							<td>{{$file->size}}</td>
							<td>{{$file->publish_date}}</td>
							<td>{{$file->expiration_date}}</td>
							<td>{{$file->category}}</td>			
							<td>
									<form action="{{ route('deletefile', $file->id) }}" method="post">
											@csrf
											@method('DELETE')
											<a href="{{ route('files.show', $file->id) }}" class="btn btn-outline-primary btn-xs"><i class="fa fa-eye"></i></a>

											<a href="{{ route('downloadfile', $file->id) }}" class="btn btn-outline-primary btn-xs"><i class="fa fa-download"></i></a>
											<a href="{{ route('emailfile', $file->id) }}" class="btn btn-outline-success btn-xs"><i class="fa fa-send"></i></a>
											<button type="submit" class="btn btn-outline-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>

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