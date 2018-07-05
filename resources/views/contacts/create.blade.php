@extends('layouts.app')
@section('content')
   <div class="row justify-content-center">
      <div class="col-md-12">
       <div class="card">
          <div class="card-body">
            <h3 class="">Create Contact</h3>
              <form action="{{route('contacts.store')}}" method="post">
              	@csrf
              	{{-- {{var_dump($errors)}} --}}
              	<p class="form-text"><strong>Client's personal information</strong></p>
                      <div class="form-row ">
                            <div class="form-group col-md-2">
                                    <label for="inputState">Title</label>
                                    <select name="name_title" class="form-control {{ $errors->has('name_title') ? ' is-invalid' : '' }}" >
                                      <option value="">Choose...</option>
                                      @foreach(['Mr.', 'Mrs.', 'Ms', 'Prof.', 'Doc.', 'Eng.']
                                      as $value => $text)
                                      <option value="{{$value}}">{{$text}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                        <div class="form-group col-md-5">
                          <label for="inputProject">First Name</label>
                          <input type="text" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" placeholder="Enter First name">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputProject">Last Name</label>
                            <input type="text" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" placeholder="Enter Last name">
                        </div>
                        
                      </div>

                        <div class="form-row ">

                        <div class="form-group col-md-4">
                          <label for="inputProject">Office Phone</label>
                          <input type="text" class="form-control {{ $errors->has('office_telephone') ? ' is-invalid' : '' }}" name="office_telephone" placeholder="Enter office phone">
                        </div>
                           
                        <div class="form-group col-md-4">
                          <label for="inputProject">Mobile</label>
                          <input type="text" class="form-control {{ $errors->has('mobile_telephone') ? ' is-invalid' : '' }}" name="mobile_telephone" placeholder="Enter mobile phone">
                        </div>
                      </div>

                      <div class="form-row ">
                               
                            <div class="form-group col-md-4">
                              <label for="inputProject">Department</label>
                              <input type="text" class="form-control {{ $errors->has('department') ? ' is-invalid' : '' }}" name="department" placeholder="Enter department name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputProject">Title</label>
                                <input type="text" class="form-control {{ $errors->has('job-title') ? ' is-invalid' : '' }}" name="job-title" placeholder="Enter job Title ">
                            </div>
                            <div class="form-group col-md-4">
                                    <label for="inputProject">Email</label>
                                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Enter Email Address ">
                                </div>
                            
                          </div>
                          <hr>
                          <div class="form-row ">
                                <div class="form-group col-md-12">
                                  <label for="inputProject">Client Name</label>
                                  <input type="text" class="form-control {{ $errors->has('client_name') ? ' is-invalid' : '' }}" name="client_name" placeholder="Enter Client name">
                                </div>
                          </div>
						<p class="form-text"><strong>Client's personal address</strong></p>
                          <div class="form-row ">    	   
                                <div class="form-group col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="form-text"><strong>Primary Address</strong></h5>
                                            <label for="inputProject"> Primary Address street</label>
                                            <input type="text" class="form-control" name="address_street">
                                            <label for="inputProject"> Primary Address city</label>
                                            <input type="text" name="address_city" class="form-control {{ $errors->has('address_city') ? ' is-invalid' : '' }}">
                                            <label for="inputProject"> Primary Address state</label>
                                            <input type="text" name="address_state" class="form-control {{ $errors->has('address_state') ? ' is-invalid' : '' }}">
                                            <label for="inputProject"> Primary Address Postal code</label>
                                            <input type="text" name="address_postal_code" class="form-control {{ $errors->has('address_postal_code') ? ' is-invalid' : '' }}">
                                            <label for="inputProject"> Primary Address country</label>
                                            <input type="text" name="address_country" class="form-control {{ $errors->has('address_country') ? ' is-invalid' : '' }}">
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="form-text"><strong>Other Address</strong></h5>
                                            
                                            <label for="inputProject"> Alternative Address street</label>
                                            <input type="text" name="alt_address_street" class="form-control">
                                            <label for="inputProject"> Alternative Address city</label>
                                            <input type="text" name="alt_address_city" class="form-control">
                                            <label for="inputProject"> Alternative Address state</label>
                                            <input type="text" name="alt_address_state" class="form-control">
                                            <label for="inputProject"> Alternative Address Postal code</label>
                                            <input type="text" name="alt_postal_code" class="form-control">
                                            <label for="inputProject"> Alternative Address country</label>
                                            <input type="text" name="alt_address_country" class="form-control">
                                        </div>
                                    </div>
                                </div>
  
                      </div>
                      <div class="form-group">
                              <label for="description" class="form-text"><strong>Description:</strong></label>
                              <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5" name="description" placeholder="Enter description"></textarea>
                      </div>
                      <div class="form-group ">
                          <label for="inputProject" class="form-text"><strong>Assigned To:</strong> </label>
                          <input type="text" class="form-control {{ $errors->has('assigned_to') ? ' is-invalid' : '' }}" name="assigned_to" placeholder="Enter name of a consultant">
                      </div>
                      <div class="pull-left">
                      <button type="submit" class="btn btn-outline-danger btn-lg">Save Client's info</button>
                      <a href="#" class="align-right"><i class="far fa-arrow-alt-circle-up display-4"></i> </a>

                      </div>
                    </form>
       </div>
   </div>
   	 </div>
	</div>
@endSection