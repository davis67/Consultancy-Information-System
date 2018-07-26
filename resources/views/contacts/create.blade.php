@extends('layouts.app')
@section('content')
   <div class="row justify-content-center">
      <div class="col-md-12">
       <div class="card">
          <div class="card-body">
            <div class="card-title row">
                    <div class="text col-md-4">
                        Create a Contacts
                    </div>
                    
                    <div class=" col-md-8">
                        <a href="{{ route('contacts.index') }}" style="float:right" class="btn btn-outline-danger btn-sm pull-right"><i class="fa fa-fw fa-reply-all"></i>View All Contacts</a>
                    </div>
                    </div>
                    {{var_dump($errors)}} 
              <form action="{{route('contacts.store')}}" method="post">
              	@csrf
            

                        <p class="form-text"><strong>Organisation's information</strong></p>
                        <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputProject">Organisation Name</label>
                            <input type="text" class="form-control {{ $errors->has('organisation_name') ? ' is-invalid' : '' }} form-control-sm" name="organisation_name" placeholder="Enter department name">
                         </div>
                         <div class="form-group col-md-4">
                            <label for="inputProject">Country</label>
                            <input type="text" class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }} form-control-sm" name="country" placeholder="Enter country name ">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputProject">Email Address</label>
                            <input type="email" class="form-control {{ $errors->has('company_email') ? ' is-invalid' : '' }} form-control-sm" name="company_email" placeholder="Enter Email Address ">
                         </div>
                                      
                        </div>
                        <p class="form-text"><strong>Organisation's address</strong></p>
                        <hr/>
                          <div class="form-row ">    	   
                                <div class="form-group col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="form-text"><strong>Primary Address</strong></h5>
                                            <label for="inputProject"> Primary Address street</label>
                                            <input type="text" class="form-control" name="address_street">
                                            <label for="inputProject"> Primary Address city</label>
                                            <input type="text" name="address_city" class="form-control {{ $errors->has('address_city') ? ' is-invalid' : '' }} form-control-sm">
                                            <label for="inputProject"> Primary Address state</label>
                                            <input type="text" name="address_state" class="form-control {{ $errors->has('address_state') ? ' is-invalid' : '' }} form-control-sm ">
                                            <label for="inputProject"> Primary Address Postal code</label>
                                            <input type="text" name="address_postal_code" class="form-control {{ $errors->has('address_postal_code') ? ' is-invalid' : '' }} form-control-sm">
                                            <label for="inputProject"> Primary Address country</label>
                                            <input type="text" name="address_country" class="form-control {{ $errors->has('address_country') ? ' is-invalid' : '' }} form-control-sm">
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="form-text"><strong>Other Address</strong></h5>
                                            
                                            <label for="inputProject"> Alternative Address street</label>
                                            <input type="text" name="alt_address_street" class="form-control form-control-sm">
                                            <label for="inputProject"> Alternative Address city</label>
                                            <input type="text" name="alt_address_city" class="form-control form-control-sm">
                                            <label for="inputProject"> Alternative Address state</label>
                                            <input type="text" name="alt_address_state" class="form-control form-control-sm">
                                            <label for="inputProject"> Alternative Address Postal code</label>
                                            <input type="text" name="alt_postal_code" class="form-control form-control-sm">
                                            <label for="inputProject"> Alternative Address country</label>
                                            <input type="text" name="alt_address_country" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>
  
                      </div>
                      <div class="form-group">
                              <label for="description" class="form-text"><strong>Description:</strong></label>
                              <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }} form-control-sm" rows="2" name="description" placeholder="Enter description"></textarea>
                      </div>
                      <hr/>
                      <p class="form-text"><strong>Contact person's information</strong></p>
                      <div class="form-row ">
                        <div class="form-group col-md-4">
                          <label for="inputProject">Full Name</label>
                          <input type="text" class="form-control {{ $errors->has('contactperson_name') ? ' is-invalid' : '' }} form-control-sm" name="contactperson_name" placeholder="Enter First name">
                        </div>                       
                        <div class="form-group col-md-4">
                          <label for="inputProject">Office Phone</label>
                          <input type="text" class="form-control {{ $errors->has('office_telephone') ? ' is-invalid' : '' }} form-control-sm" name="office_telephone" placeholder="Enter office phone">
                        </div>
                           
                        <div class="form-group col-md-4">
                          <label for="inputProject">Mobile</label>
                          <input type="text" class="form-control {{ $errors->has('mobile_telephone') ? ' is-invalid' : '' }} form-control-sm" name="mobile_telephone" placeholder="Enter mobile phone">
                        </div>
                      </div>

                      <div class="form-row ">
                               
                            <div class="form-group col-md-4">
                              <label for="inputProject">Department</label>
                              <input type="text" class="form-control {{ $errors->has('department') ? ' is-invalid' : '' }} form-control-sm" name="department" placeholder="Enter department name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputProject">Title</label>
                                <input type="text" class="form-control {{ $errors->has('job_title') ? ' is-invalid' : '' }} form-control-sm" name="job_title" placeholder="Enter job Title ">
                            </div>
                            <div class="form-group col-md-4">
                                    <label for="inputProject">Email-Address</label>
                                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }} form-control-sm" name="email" placeholder="Enter Email Address ">
                                </div>
                            
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