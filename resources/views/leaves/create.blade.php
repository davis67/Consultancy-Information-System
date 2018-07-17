@extends('layouts.app')
@section('content')
	 	<div class="card">
         <div class="card-body">
           <h2 class="card-title">New Leave Entry</h2>
            <form action="{{route('leaves.store')}}" method="post">
            	@csrf
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <label for="inputState">Leave Type</label>
                        <select  class="form-control {{ $errors->has('leave_type') ? 'is-invalid' : '' }} form-control-sm" name="leave_type">
                          <option value="">Choose...</option>
                          @foreach(['Anual leave', 'Study Leave', 'Sick Leave', 'Compationate Leave', 'Maternity Leave'] as $item => $value)
                          <option value="{{$value}}">{{$value}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control form-control-sm" name="description" rows="2" id="description" placeholder="Enter description of the project"></textarea>
                    </div>
                      </div>
                    </div>  
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCity">Request Start Date</label>
                        <input type="date" class="form-control {{ $errors->has('start_date') ? ' is-invalid' : '' }} form-control-sm" name="start_date" id="inputCity">
                        
                      </div>
                      <div class="form-group col-md-6">
                            <label for="inputZip">Request End Date</label>
                            <input type="date" name="end_date" class="form-control {{ $errors->has('end_time') ? ' is-invalid' : '' }} form-control-sm" id="inputZip">
                      </div>
                    </div>
                    <div class="pull-left">
                    <button type="submit" class="btn btn-outline-danger btn-lg">Request for Leave</button>
                    </div>
                  </form>
              </div>
        
      </div>
      	
@endSection
