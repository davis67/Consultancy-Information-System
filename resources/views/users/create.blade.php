@extends('layouts.app')
@section('content')
    <div class="card card-block">
        <div class="card-header">
            Create a new user
        </div>
        <div class="card-body">
            <form action="{{route('users.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-success">Add User</button>
                        </div>
                </div>
                
            </form>
        </div>
    </div>
@stop