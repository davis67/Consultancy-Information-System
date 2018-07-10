<!doctype html>
<html lang="en">
@include('partials.head')
<body>
 <div class="container-scroller">
  @if(!Auth::guest())
  @include("layouts.navbar")
  <div class="container-fluid page-body-wrapper">
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
@include('partials.scripts')
@include("partials.flash")
@yield('script')
</body>
</html>