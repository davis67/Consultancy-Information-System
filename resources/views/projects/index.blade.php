@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
						<div class="row">
								<div class="col-md-12 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Project Status</h4>
											<div class="table-responsive">
												<table class="table example">
													<thead>
														<tr>
															<th>Name</th>
															<th>Start Date</th>
															<th>End Date</th>
															<th>Status</th>
															<th>Contract RefNo</th>
															<th>Team</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														@foreach($projects as $project)
														<tr>
															<td>
																{{ $project->opportunity->opportunity_name}}
															</td>
															<td>
															{{ $project->start_date }}
															</td>
															<td>
																{{ $project->end_date }}
															</td>
															<td>
																@if($project->isComplete == 1)
																completed
																@else
																still running ...
																@endif
															</td>
															<td>
																{{ $project->contractRefNo }}
															</td>
															<td>
																{{ $project->team }}
															</td>
															<td>
															<a href="{{ route('projects.show', $project->id) }}" class="btn btn-outline-danger btn-xs"><i class="fa fa-eye"></i></a>
															<a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-danger btn-xs"><i class="fa fa-edit"></i></a>
															</td>
															
														</tr>
														@endforeach
														
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
					
						<!-- content-wrapper ends -->
						<!-- partial -->
					</div>
			  </div>
	</div>
@endSection
