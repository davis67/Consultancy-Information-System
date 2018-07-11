@extends('layouts.app')
@section('content')
        <div class="page-header">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Opportunities</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Opportunities</li>
              </ol>
            </nav>
            <h3 class="page-title">
             {{--  <span class="page-title-icon bg-gradient-danger text-white mr-2">
                <i class="mdi mdi-folder-outline"></i>                 
              </span> --}}
              <a class="btn btn-sm btn-gradient-danger mt-2" href="{{ route('opportunities.create') }}">+Create Opportunity</a>
            </h3>
          </div>
          <div class="row">
          	<div class="col-lg-12 grid-margin stretch-card">
          	<div class="card">
			
			<div class="card-body">
				<div class="card-title">
				Showing all Opportunities
			   </div>
				<table class="table example" >
					<thead>
						<tr>
							<th>Opportunity Name</th>
							<th>Expected Close Date</th>
							<th>OM_number</th>
							<th>Team</th>
							<th>Funded By</th>
							<th>Assigned To</th>
							<th>Options</th>
						</tr>
					</thead>
					<tbody>
						
							@foreach($opportunities as $opportunity)
							<tr>
							<td>{{$opportunity->opportunity_name}}</td>
							<td>{{$opportunity->date}}</td>
							<td><strong>AH-{{$opportunity->OM_number}}-OM</strong></td>
							<td>{{$opportunity->team}}</td>
							<td>{{$opportunity->funded_by}}</td>
							<td>{{$opportunity->assigned_to}}</td>
							<td>
							        <a href="#"><i class="fa fa-eye md-18 text-dark" style="font-size: 20px;"></i></a>
							        <a href="{{ route('opportunities.edit', $opportunity->id) }}"><i class="mdi mdi-file-check md-18 text-dark" style="font-size: 20px;"></i></a>
							        <form action="{{ route('opportunities.destroy', $opportunity->id)}}" method="post">
													@csrf
													<input name="_method" type="hidden" value="DELETE">
													<button type="submit" style="color: 000000;"><i class="mdi mdi-delete md-18 text-dark" style="font-size: 20px;"></i></button>
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