<!doctype html>
<html lang="en">
@include('partials.head')
<body>
 <div class="container-scroller">
  @if(!Auth::guest())
  @include("layouts.navbar")
  <div class="container-fluid page-body-wrapper">
    @include('partials.todo')
    @include('layouts.sidebar')
    @endif
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
       @yield('content')
     </div>
   </div>
 </div>
</div>
@include('layouts.footer')
@include("partials.flash")
@yield('script')
@include('partials.scripts')
</body>
</html>