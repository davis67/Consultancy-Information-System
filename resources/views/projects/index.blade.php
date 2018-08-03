@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
						<div class="row">
								<div class="col-md-10 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-4">
														<a class="btn btn-outline-danger btn-sm" href=""><i class="mdi mdi-reply"></i>ViewProjects</a>
										</div>
		
											</div>
											<h4 class="card-title">Project Status</h4>
											<div class="table-responsive">
												<table class="table">
													<thead>
														<tr>
															<th>
																#
															</th>
															<th>
																Name
															</th>
															<th>
																Due Date
															</th>
															<th>
																Progress
															</th>
															<th>
																	Status
																</th>
														</tr>
													</thead>
													<tbody>
														@foreach($tasks as $task)
														<tr>
															<td>
																{{ $task->id }}
															</td>
															<td>
															{{ $task->text }}
															</td>
															<td>
																{{ $task->start_date }}
															</td>
															<td>
																<div class="progress">
																	<div class="progress-bar @if(($task->progress)>=0.9)bg-gradient-success @elseif((($task->progress)>=0.5)) bg-gradient-info @else bg-gradient-danger @endif" role="progressbar" style="width: {{ $task->progress*100 }}%" aria-valuenow="{{ $task->progress*10 }}" aria-valuemin="0" aria-valuemax="100"></div>
																	<span style="font-size:60%; color:red;">{{ $task->progress*100 }}%</span>
																</div>
															</td>
															<td>
																@if(($task->progress)==1)
													
																		<span class="text-danger"><i class="fa fa-check"></i></span>
					
																@else
																<i class="mdi mdi-close-circle-outline text-danger text-center"></i>
																@endif
															</td>
														</tr>
														@endforeach
														<caption>
															Overall Progress:
														</caption>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								{{-- <div class="col-md-5 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title text-white">Todo</h4>
											<div class="add-items d-flex">
												<input type="text" class="form-control todo-list-input"  placeholder="What do you need to do today?">
												<button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
											</div>
											<div class="list-wrapper">
												<ul class="d-flex flex-column-reverse todo-list todo-list-custom">
													<li>
														<div class="form-check">
															<label class="form-check-label">
																<input class="checkbox" type="checkbox">
																Meeting with Alisa
															</label>
														</div>
														<i class="remove mdi mdi-close-circle-outline"></i>
													</li>
													<li class="completed">
														<div class="form-check">
															<label class="form-check-label">
																<input class="checkbox" type="checkbox" checked>
																Call John
															</label>
														</div>
														<i class="remove mdi mdi-close-circle-outline"></i>
													</li>
													<li>
														<div class="form-check">
															<label class="form-check-label">
																<input class="checkbox" type="checkbox">
																Create invoice
															</label>
														</div>
														<i class="remove mdi mdi-close-circle-outline"></i>
													</li>
													<li>
														<div class="form-check">
															<label class="form-check-label">
																<input class="checkbox" type="checkbox">
																Print Statements
															</label>
														</div>
														<i class="remove mdi mdi-close-circle-outline"></i>
													</li>
													<li class="completed">
														<div class="form-check">
															<label class="form-check-label">
																<input class="checkbox" type="checkbox" checked>
																Prepare for presentation
															</label>
														</div>
														<i class="remove mdi mdi-close-circle-outline"></i>
													</li>
													<li>
														<div class="form-check">
															<label class="form-check-label">
																<input class="checkbox" type="checkbox">
																Pick up kids from school
															</label>
														</div>
														<i class="remove mdi mdi-close-circle-outline"></i>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div> --}}
					
						<!-- content-wrapper ends -->
						<!-- partial -->
					</div>
			  </div>
	</div>
@endSection
