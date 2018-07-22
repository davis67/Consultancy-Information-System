
@extends('layouts.app')
@section('content')
<div class="card">
              <div class="card-body">
                 <h3 class="card-title text-center">Register a new Associate</h3>
              <form  method="post" action="">
                      @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Name:</label>
  
                            <div class="col-md-8">
                               <input type="type" name="name" class="form-control form-control-sm" id="">
                              </div>
                        </div>
                      <div class="form-group row">
                          <label for="date" class="col-md-2 col-form-label text-md-right">Contacts:</label>

                          <div class="col-md-8">
                              <input type="text" class="form-control form-control-sm" name="contacts">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="date" class="col-md-2 col-form-label text-md-right">Email:</label>

                          <div class="col-md-8">
                              <input id="email" type="email" class="form-control form-control-sm" name="email">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="date" class="col-md-2 col-form-label text-md-right">Time Expected to Work:</label>

                          <div class="col-md-8">
                              <input id="time" type="text" class="form-control form-control-sm" name="time">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="password" class="col-md-2 col-form-label text-md-right">Time Worked:</label>

                          <div class="col-md-8">
                              <input type="text" name="time_worked" class="form-control form-control-sm"></input>
                            </div>
                      </div>
                      <div class="form-group row">
                          <label for="stages" class="col-md-2 col-form-label text-md-right">Skills Required:</label>

                          <div class="col-md-8">
                              <input  name="skills_required" class="form-control form-control-sm">
                            </div>
                      </div>
                      <div class="form-group row">
                          <label  class="col-md-3 col-form-label text-md-right"></label>

                          <div class="col-md-8">
                          <button type="submit" class="btn btn-md btn-outline-danger" style="border-radius:none;">Save an Associate</button>                            
                      </div>
                      </div>

                    </form>
          </div>
        </div>
@endSection
