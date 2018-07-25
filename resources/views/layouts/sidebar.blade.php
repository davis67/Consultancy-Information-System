 <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="/uploads/avatr.jpeg" alt="profile">
          <span class="login-status online"></span> <!--change to offline or busy as needed-->              
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
          <span class="text-secondary text-small">
            @if(Auth::user()->is_permitted ==7)
                Managing Director
            @elseif(Auth::user()->is_permitted ==6)
            Chief Of Staffs
            @elseif(Auth::user()->is_permitted ==5)
            Deputy Managing Director
            @elseif(Auth::user()->is_permitted ==4)
            CEO
            @elseif(Auth::user()->is_permitted ==3)
            Director
            @elseif(Auth::user()->is_permitted ==2)
            Assistant Manager
            @else
            Consultant
            @endif
          </span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('home')}}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#opportunity" aria-expanded="false" aria-controls="opportunity">
        <span class="menu-title">Opportunities</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
      </a>
      <div class="collapse" id="opportunity">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> 
            <a class="nav-link" href="{{ route('opportunities.create') }}">
              Create Opportunity
            </a>
          </li>
          <li class="nav-item">
           <a class="nav-link" href="{{ route('opportunities.index') }}">
             View Opportunity
           </a>
         </li>
       </ul>
     </div>
   </li>
   <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#document" aria-expanded="false" aria-controls="document">
      <span class="menu-title">Documents</span>
      <i class="menu-arrow"></i>
      <i class="mdi mdi-file-document menu-icon"></i>
    </a>
    <div class="collapse" id="document">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"> 
          <a class="nav-link" href="{{ route('documents.create') }}">
            Create Document
          </a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="{{ route('documents.index') }}">
           View Document
         </a>
       </li>
     </ul>
   </div>
 </li>
 <li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#contact" aria-expanded="false" aria-controls="contact">
    <span class="menu-title">Contacts</span>
    <i class="menu-arrow"></i>
    <i class="mdi mdi-contacts menu-icon"></i>
  </a>
  <div class="collapse" id="contact">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"> 
        <a class="nav-link" href="{{ route('contacts.create') }}">
          Create Contact
        </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="{{ route('contacts.index') }}">
         View Contact
       </a>
     </li>
   </ul>
 </div>
</li>
<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#tasks" aria-expanded="false" aria-controls="tasks">
    <span class="menu-title">Tasks</span>
    <i class="menu-arrow"></i>
    <i class="mdi mdi-format-size menu-icon"></i>
  </a>
  <div class="collapse" id="tasks">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"> 
        <a class="nav-link" href="{{ route('tasks.create') }}">
          Create a Task
        </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="{{ route('tasks.index') }}">
         View Tasks
       </a>
     </li>
   </ul>
 </div>
</li>
<li class="nav-item sidebar-actions">
  <span class="nav-link">
    <div class="border-bottom">
      <h6 class="font-weight-normal mb-3">Projects</h6>                
    </div>
    <button class="btn btn-block btn-sm btn-gradient-danger mt-4"><i style="color:white;" class="mdi mdi-presentation-play menu-icon"></i> View Projects</button>
  </span>
</li>
</ul>
</nav>