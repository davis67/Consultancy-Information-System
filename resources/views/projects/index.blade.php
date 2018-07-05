@extends('layouts.app')
@section('content')
        <div class="page-header">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Projects</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Projects</li>
              </ol>
            </nav>
            <h3 class="page-title">
             {{--  <span class="page-title-icon bg-gradient-danger text-white mr-2">
                <i class="mdi mdi-folder-outline"></i>                 
              </span> --}}
              <a class="btn btn-sm btn-gradient-danger mt-2" href="{{ route('opportunities.create') }}">+Migrate anOpportunity </a>
            </h3>
          </div>
          <div class="row">
          	<div class="col-lg-12 grid-margin stretch-card">
          	<div class="card">
			
			<div class="card-body">
				<div class="card-title">
				Showing all Projects
			   </div>
				<table id="example" class="table mdl-data-table" >
					<thead>
						<tr>
							<th>Project Name</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Team</th>
							<th>OM_number</th>
							<th>Assigned To</th>
							<th>Mark Finished</th>
						</tr>
					</thead>
					<tbody>
						
							@foreach($projects as $project)
							<tr>
							<td>{{$project->project_name}}</td>
							<td>{{$project->start_date}}</td>
							<td>{{$project->end_date}}</td>
							<td>{{$project->team}}</td>
							<td>OM-{{$project->OM_number}}-AH</td>
							<td>{{$project->assigned_to}}</td>
							<td><i>finished</i></td>
							<td>
							<a href="" style="color: 000000;"><i class="mdi mdi-file-check md-18 text-dark" style="font-size: 25px;"></i></a>
							<a href="" style="color: 000000;"><i class="mdi mdi-delete text-dark" style="font-size: 25px;"></i></a
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