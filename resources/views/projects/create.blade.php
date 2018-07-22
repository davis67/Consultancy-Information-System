
@extends('layouts.app')
@section('content')
<div class="card">
              <div class="card-body">
                 <h3 class="card-title text-center">Create a Project</h3>
              <form  method="post" action="">
                      @csrf
                        <div class="form-group row">
                            <label for="date" class="col-md-2 col-form-label text-md-right">Team:</label>
  
                            <div class="col-md-8">
                                <select id="inputTeam" class="form-control" name="team">
                                    <option value="">Choose...</option>
                                    @foreach(App\Team::names() as  $team)
                                    <option value="{{$team}}">{{$team}}</option>
                                    @endforeach
                                  </select>  
                              </div>
                        </div>
                      <div class="form-group row">
                          <label for="date" class="col-md-2 col-form-label text-md-right">Start Date:</label>

                          <div class="col-md-8">
                              <input id="date" type="date" class="form-control" name="start_date">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="date" class="col-md-2 col-form-label text-md-right">End Date:</label>

                          <div class="col-md-8">
                              <input id="date" type="date" class="form-control" name="End_date">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="date" class="col-md-2 col-form-label text-md-right">Contract Ref No:</label>

                          <div class="col-md-8">
                              <input id="contract" type="text" class="form-control" name="contract_ref">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="password" class="col-md-2 col-form-label text-md-right">Assigned To:</label>

                          <div class="col-md-8">
                              <select  multiple="multiple" name="assigned_to[]" class="form-control form-control-sm"  id="assignees"></select>
                            </div>
                      </div>
                      <div class="form-group row">
                          <label for="stages" class="col-md-2 col-form-label text-md-right">Project Manager:</label>

                          <div class="col-md-8">
                              <select  name="manager[]" class="form-control form-control-sm"  id="stages">
                              </select>
                            </div>
                      </div>
                      <div class="form-group row">
                          <label  class="col-md-3 col-form-label text-md-right"></label>

                          <div class="col-md-8">
                          <button type="submit" class="btn btn-md btn-outline-danger" style="border-radius:none;">Save Project</button>                            
                      </div>
                      </div>

                    </form>
          </div>
        </div>
@endSection
