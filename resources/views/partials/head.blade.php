<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- csss -->
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
  <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
  <script src="{{ asset('js/dropzone.js') }}"></script>

  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <title>COINS</title>
  <!-- stack anything in the head -->
  @stack("head")
</head>