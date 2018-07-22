@extends('layouts.app');
@section('content')
<div class="card">
    <div class="card-body">
            <h3> Leaves to approve</h3>
    
        <table class="table example">
            <thead>
            <tr>
                <th>Name</th>
                <th>Leave Type</th>
                <th> Requested Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
            </thead>
        <tbody>
                @foreach($leaves as $leave)
                @if(Auth::user()->name == $leave->user->reportsTo && $leave->status == 'submitted')
                    <tr>
                    <td>{{ $leave->user->name}}</td>
                    <td>{{ $leave->leave_type}}</td>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ $leave->end_date }}</td>                    
                    <td>
                        <a href="" class="btn btn-xs btn-outline-danger">Accept</a>                        
                        <a href="" class="btn btn-xs btn-outline-danger">Decline</a>
                    </td>
                    </tr>
                        @elseif(Auth::user()->is_permitted == 4 && $leave->status == 'Endorsed')
                        <tr>
                                <td>{{ $leave->user->name}}</td>
                                <td>{{ $leave->leave_type}}</td>
                                <td>{{ $leave->start_date }}</td>
                                <td>{{ $leave->end_date }}</td>                    
                                <td>
                        <a href="" class="btn btn-xs btn-outline-danger">Review</a>                        
                        <a href="" class="btn btn-xs btn-outline-danger">Decline</a>
                                </td></tr>
                        @elseif(Auth::user()->is_permitted == 7 && $leave->status == 'Reviewed')
                        <tr>
                                <td>{{ $leave->user->name}}</td>
                                <td>{{ $leave->leave_type}}</td>
                                <td>{{ $leave->start_date }}</td>
                                <td>{{ $leave->end_date }}</td>                    
                                <td>
                        <a href="" class="btn btn-xs btn-outline-danger">Approve</a>                       
                        <a href="" class="btn btn-xs btn-outline-danger">Decline</a>
                                </td></tr>
                        @endif
                    
                @endforeach
           
        </tbody>
        </table>
    </div>
</div>
<hr/>

<div class="card">
    <div class="card-body">
        <h3>My Leave requests</h3>
        
            <table class="table example">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Leave Type</th>
                        <th> Requested Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                <tbody>
                        @foreach($leaves as $leave)
                        @if($leave->user->id == Auth::user()->id)
                            <tr>
                            <td>{{ $leave->user->name}}</td>
                            <td>{{ $leave->leave_type}}</td>
                            <td>{{ $leave->start_date }}</td>
                            <td>{{ $leave->end_date }}</td>
                            <td>{{ $leave->status }}</td>
                            <td>
                                    <form action="{{ route('leaves.destroy', $leave->id)}}" method="post">
                                            @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <div class="btn-group">
                                                <a href="" class="btn btn-outline-danger btn-xs"><i class="fa fa-eye"></i></a>
                                                <button type="submit" class="btn btn-outline-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                                </div>
                                    </form>
                            </td>
                            </tr>
                            @endif
                        @endforeach
                    </tr>
                </tbody>
                </table>
                
              
    </div>
</div>
@stop