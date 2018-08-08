<!--Edit Modal -->
<div class="modal fade" id="UpdatetaskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"  id="taskModalLabel">Update a Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="taskBody">
                        <form action="{{route('tasks.update', $task->id)}}" method="put">
                                @csrf
                                    <div class="form-row ">
                                      <div class="form-group col-md-6">
                                        <label for="inputTask">Task Name</label>
                                        <input type="text" name="task_name" class="form-control {{ $errors->has('task_name') ? ' is-invalid' : '' }} form-control-sm" placeholder="Enter task name" value="{{ $task->task_name }}">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="inputState">Status</label>
                                        <select  class="form-control {{ $errors->has('task_status') ? 'is-invalid' : '' }} form-control-sm" name="task_status">
                                          <option value="">Choose...</option>
                                          @foreach(['Not started', 'In Progress', 'Completed', 'Pending input', 'Deffered'] as $item => $value)
                                          <option value="{{$item}}">{{$value}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                    </div>
                
                                    <div class="form-row ">
                                            <div class="form-group col-md-6">
                                                    <label for="inputState">Priority</label>
                                                    <select id="inputState" name="priority" class="form-control {{ $errors->has('priority') ? ' is-invalid' : '' }}">
                                                      <option value="">Choose...</option>
                                                      <option value="1">High</option>
                                                      <option value="2">Medium</option>
                                                      <option value="3">Low</option>
                                                    </select>
                                                  </div>
                                                  <div class="form-group col-md-6">
                                                        <label for="inputState">Service Line</label>
                                                <select id="inputState" name="service_line" class="form-control {{ $errors->has('service_line') ? ' is-invalid' : '' }} form-control-sm">
                                                   <option value="">Choose...</option>
                                                  @foreach(['Monitoring and Evaluation', 'Recruitment Services', 'HR Services', 'TCB Services', 'Outsourced Financial Services', 'ICT or MIS Services', 'Procurement Services', 'Public Sector Management Services', 'IS Audits', 'ACL', 'Enterprise Risk Management', 'Local Government', 'Management consultancy', 'Financial Advisory', 'Prequalification for Consultancy Services', 'Business Development', 'Infrastructure Consultancy', 'Service Activities(Indirect Services)'] as $item => $value)
                                                  <option value="{{$item}}">{{$value}}</option>
                                                  @endforeach
                                              </select>
                                             </div>
                                         </div>   
                                    <div class="form-row">
                                      <div class="form-group col-md-4">
                                        <label for="inputCity">Start Date</label>
                                      <input type="date" value="{{ $task->start_date }}" class="form-control {{ $errors->has('start_date') ? ' is-invalid' : '' }} form-control-sm" name="start_date" id="inputCity">
                                        
                                      </div>
                                      <div class="form-group col-md-5">
                                            <label for="inputZip">End Date</label>
                                            <input type="date" value="end_date" name="end_date" class="form-control {{ $errors->has('end_time') ? ' is-invalid' : '' }} form-control-sm" id="inputZip">
                                      </div>
                                      <div class="form-group col-md-3">
                                            <label for="inputTeam">Team </label>
                                            <select id="inputTeam" class="form-control {{ $errors->has('team') ? ' is-invalid' : '' }} form-control-sm" name="team">
                                                <option value="">Choose...</option>
                                                @foreach(['TSS', 'DCS', 'MCS', 'CSS', 'BDS', 'HTA', 'HCM', 'SPS', 'HillGroove'] as $value => $item)
                                                <option value="{{$value}}">{{$item}}</option>
                                                @endforeach
                                              </select>     
                                      </div>
                                    </div>
                
                                    <div class="form-row">
                                            <div class="form-group col-md-4">
                                              <label for="inputCity">Start Time</label>
                                              <input type="time" name="start_time" class="form-control {{ $errors->has('start_time') ? ' is-invalid' : '' }} form-control-sm" id="inputCity">  
                                            </div>
                                            <div class="form-group col-md-4">
                                                  <label for="inputZip">End Time</label>
                                                  <input type="time" name="end_time" class="form-control {{ $errors->has('end_time') ? ' is-invalid' : '' }} form-control-sm" id="inputZip">
                                            </div>
                
                                            <div class="form-group col-md-4">
                                                <label for="inputState">Related To:</label>
                                                    <select id="inputState" name="related_to" class="form-control {{ $errors->has('related_to') ? ' is-invalid' : '' }} form-control-sm">
                                                      <option value="">Choose...</option>
                                                      @foreach(['Bug', 'Case', 'Client', 'Contact', 'Lead', 'Opportunity','Project', 'project task', 'Target', 'Task'] as $value => $item)
                                                      <option value="{{$value}}">{{$item}}</option>
                                                      @endforeach
                                                    </select>
                                                  </div>  
                                          </div>
                
                                    <div class="form-group">
                                            <label for="description">Description:</label>
                                            <textarea class="form-control form-control-sm" name="description" rows="2" id="description" placeholder="Enter description of the project">{{ $task->description }}</textarea>
                                    </div>
                                    <div class="form-group ">
                                        <label for="inputProject">Assigned To: </label>
                                        <input type="text" name="assigned_to" class="form-control {{ $errors->has('assigned_to') ? ' is-invalid' : '' }} form-control-sm" placeholder="Enter name of a consultant">
                                    </div>
                                    {{-- <div class="pull-left">
                                    <button type="button" class="btn btn-outline-danger  btn-sm">Update a task</button>
                                    </div> --}}
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger  btn-sm">Update a task</button>
    
                                            <button type="button" class="btn btn-danger btn-sm btn-gradient-danger " data-dismiss="modal"><span aria-hidden="true">&times;</span> Close</button>
                                        </div>
                                  </form>
                
            </div>
        </div>
    </div>					
    
            
    </div>