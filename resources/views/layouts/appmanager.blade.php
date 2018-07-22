<!doctype html>
<html lang="en">
@include('partials.head')
<style>
    /* @import url(https://fonts.googleapis.com/css?family=Roboto:400,400italic,600,600italic,700,700italic);
body {
		font-family: 'Roboto';
		background-color: #f9f9f9;
} */

.tab-container{
    
	padding:0;
	margin:10px;
    margin-top:50px;
	border-radius:5px;
	box-shadow: 0 2px 3px rgba(0,0,0,.3)
	
}

header {
		position: relative;
}

.hide {
		display: none;
}

.tab-content {
		padding:25px;
}

#material-tabs {
		position: relative;
		display: block;
	  padding:0;
		border-bottom: 1px solid #e0e0e0;
}

#material-tabs>a {
		position: relative;
	 display:inline-block;
		text-decoration: none;
		padding: 22px;
		/* text-transform: uppercase; */
		font-size: 14px;
		font-weight: 600;
		color: #FF6295;
		text-align: center;
		outline:;
}

#material-tabs>a.active {
		font-weight: 700;
		outline:none;
}

#material-tabs>a:not(.active):hover {
		background-color: inherit;
		color: #7c848a;
}

@media only screen and (max-width: 520px) {
		.nav-tabs#material-tabs>li>a {
				font-size: 11px;
		}
}

.yellow-bar {
		position: absolute;
		z-index: 10;
		bottom: 0;
		height: 3px;
		background: #458CFF;
		display: block;
		left: 0;
		transition: left .2s ease;
		-webkit-transition: left .2s ease;
}

#tab1-tab.active ~ span.yellow-bar {
		left: 0;
		width: 160px;
}

#tab2-tab.active ~ span.yellow-bar {
		left:165px;
		width: 142px;
}

#tab3-tab.active ~ span.yellow-bar {
		left: 330px;
		width: 135px;
}

#tab4-tab.active ~ span.yellow-bar {
		left:490px;
		width: 100px;
}
#tab5-tab.active ~ span.yellow-bar {
		left:600px;
		width: 100px;
}
</style>
<body>
 <div class="container-scroller">
  @if(!Auth::guest())
  @include("layouts.navbar")
  @endif
  <div class="container main-panel" style="margin-top:60px;">
    {{-- @include('layouts.sidebar') --}}
   
    <!-- partial -->
    {{-- <div class="main-panel">
      <div class="content-wrapper">
       @yield('content')
     </div>
   </div> --}}
   @yield('content')
 </div>
</div>
@include('layouts.footer')
@include("partials.flash")
@yield('script')
@include('partials.scripts')
</body>
</html>