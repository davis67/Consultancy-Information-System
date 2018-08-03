@extends('layouts.app')
@section('content')

          <div class="row">
          	<div class="col-lg-12 grid-margin stretch-card">
          	<div class="card">
			
			<div class="card-body">
				<div class="card-title row">
					<div class="text col-md-4">
							Showing all Opportunities
					</div>
				
				<div class=" col-md-8">
						<a href="{{ route('opportunities.create') }}" style="float:right" class="btn btn-outline-danger btn-sm pull-right"><i class="fa fa-fw fa-reply-all"></i>Create Opportunity</a>
						{{-- <a href="{{ asset('lists') }}" style="float:right" class="btn btn-outline-danger btn-sm pull-right"><i class="fa fa-fw fa-reply-all"></i>View Trashed Opportunity</a> --}}

					</div>
				 </div>
				 
				<table class="table example table-responsive" >
					<thead>
						<tr>
							<th>Opportunity Name</th>
							<th>Expected Close Date</th>
							<th>OM_number</th>
							<th>Status</th>
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
							<td>{{$opportunity->expected_date}}</td>
							<td><strong>AH-{{$opportunity->OM_number}}-OM</strong></td>
							<td class="text-success"><i>{{ $opportunity->sales_stage }}</i></td>
							<td>{{$opportunity->team}}</td>
							<td>{{$opportunity->funded_by}}</td>
							<td>{{$opportunity->assigned_to}}</td>
							<td>
										<div class="btn-group">
												<a href="{{ route('opportunities.show', $opportunity->id) }}" class="btn btn-outline-danger btn-sm"><i class="fa fa-eye"></i></a>
										</div>
								
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