@extends('layouts.app')
@section('content')
    <div class="card">
      <div class="card-body">
         <div class="card-title row">
            <div class="text col-md-4">
                Create a document
            </div>
          
          <div class=" col-md-8">
              <a href="{{ route('documents.index') }}" style="float:right" class="btn btn-outline-danger btn-sm pull-right"><i class="fa fa-fw fa-reply-all"></i>View All Documents</a>
            </div>
           </div>
          {{-- {{  var_dump($errors)}} --}}
            <form action="{{route('documents.store')}}" method="post" enctype="multipart/form-data">
              @csrf
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <label for="inputProject">Document</label>
                        <div class="custom-file">
                            <input type="file" name="document_file" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputState">Status</label>
                        <select id="inputState"name="status" class="form-control form-control-sm">
                          <option value="">Choose...</option>
                          @foreach(['Active', 'Draft', 'Draft', 'FAQ', 'Expired', 'Under Review', 'Pending'] as $item => $value)
                          <option value="{{ $value }}">{{$value}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-row ">
                        <div class="form-group col-6">
                            <label for="inputOM" >Document Name</label>
                            <input type="text" class="form-control form-control-sm" name="document_name" id="inputOM">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputRef">Revision</label>
                            <input type="text" class="form-control form-control-sm" name="revision" id="inputRef">
                        </div>
                    </div>  
                    
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="inputCity">Publish Date</label>
                        <input type="date" class="form-control form-control-sm" name="publish_date" id="inputCity">
                        
                      </div>
                      <div class="form-group col-md-3">
                            <label for="inputZip">Expiration Date</label>
                            <input type="date" class="form-control form-control-sm" name="expiration_date" id="inputZip">
                      </div>
                      <div class="form-group col-md-3">
                            <label for="inputTeam">Team </label>
                            <select id="inputTeam" name="team" class="form-control form-control-sm">
                              <option value="">Choose...</option>
                              @foreach(['TSS', 'DCS', 'MCS', 'CSS', 'BDS', 'HTA', 'HCM', 'SPS', 'HillGroove'] as $value => $item)
                                <option value="{{$item}}">{{$item}}</option>
                                @endforeach
                            </select>
                        
                      </div>
                      <div class="form-group col-md-3">
                            <label for="inputTeam">Category </label>
                            <select id="inputTeam" name="category" class="form-control form-control-sm">
                              <option value="">Choose...</option>
                              @foreach(['Marketing', 'Knowledge Base', 'Sales', 'Inception report', 'Terms of Reference', 'CV', 'Financial Proposal', 'Technical report', 'Request for Proposal'] as $item =>$value)
                              <option value="{{$value}}">{{$value}}</option>
                              @endforeach
                            </select>
                        
                      </div>

                    </div>
                    <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" rows="3" name="description" placeholder="Enter description of the project"></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="inputProject">Assigned To: </label>
                        <input type="text" class="form-control form-control-sm" name="assigned_to" placeholder="Enter name of a consultant">
                    </div>
                    <div class="pull-left">
                    <button type="submit" class="btn btn-outline-danger btn-lg">Save a document</button>
                    </div>
                  </form>
      </div>

@endSection