<!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="{{ asset('/css/style.css')}}" >
    {{-- <link rel="stylesheet" href="{{ asset('/css/app.css')}}" > --}}
    <!-- plugins:css -->
    <link rel="stylesheet" href="/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
  
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />
    <link href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css" rel="stylesheet">
    <script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
 
    <style>
            html, body {
              min-height: 100%;
              margin: 0;
              padding: 0;
            }
            .left-container {
              margin-top:5vh;
              overflow: hidden;
               position: relative; 
              margin-left:100px;
            }
            /* .right-container {
             margin-top:160px;
              border-right: 1px solid #cecece;
              float: right;
              height: 50%;
              width: 10%;
              box-shadow: 0 0 5px 2px #aaa;
              position: relative;
              z-index:2;
            } */
            </style>
</head>
<body>
@if(!Auth::guest())
@include("layouts.navbar")
    @include('partials.todo')
    @endif
    
    <div class="row">
        <div class="col-md-12">
                <h2 class="text-center" style="margin-top:12vh;">Project Management Tool</h2>
        </div>
        <div class="col-md-4">
                <a class="btn btn-outline-danger btn-md"style="margin-left:150px;" href=""><i class="mdi mdi-reply"></i>Back tO Coins</a>

        </div>
        <div class="col-md-8">
            <a class="btn btn-outline-danger btn-md"style="float:right; margin-right:180px;" href=""><i class="mdi mdi-eye"></i> View Entire Project</a>
        </div>
           </div>

    </div>
        <div class="left-container" id="gantt" style='width:80%; height:80vh;'></div>
      
    </div>
        <script type="text/javascript">
            gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
            gantt.config.order_branch = true;/*!*/
            gantt.config.order_branch_free = true;/*!*/
            gantt.init("gantt");

            gantt.load("/api/data");

            var dp = new gantt.dataProcessor("/api");/*!*/
            dp.init(gantt);/*!*/
            dp.setTransactionMode("REST");/*!*/
        </script>
       
            @include('layouts.footer')

            @yield('script')
            @include('partials.scripts')
            @include("partials.flash")
</body>
</html>