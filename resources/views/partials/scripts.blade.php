{{-- <script src="{{  asset('/js/app.js')}}" type="text/javascript"></script> --}}
 <!-- plugins:js -->
 <script src="/vendors/js/vendor.bundle.base.js"></script>
 <script src="/vendors/js/vendor.bundle.addons.js"></script>
 <!-- endinject -->
 <!-- Plugin js for this page-->
 <!-- End plugin js for this page-->
 <!-- inject:js -->
 <script src="/js/off-canvas.js"></script>
 <script src="/js/hoverable-collapse.js"></script>
 <script src="/js/misc.js"></script>
 <script src="/js/settings.js"></script>
 <script src="/js/todolist.js"></script>
 <!-- endinject -->
 <!-- Custom js for this page-->
 <script src="/js/dashboard.js"></script>
 <!-- End custom js for this page-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" ></script>
 <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" ></script>
 <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" ></script>
 <script src="{{ asset('/js/script.js')}}" ></script>
 <script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>

<script>
    $(document).ready(function() {
    $('#material-tabs').each(function() {

            var $active, $content, $links = $(this).find('a');

            $active = $($links[0]);
            $active.addClass('active');

            $content = $($active[0].hash);

            $links.not($active).each(function() {
                    $(this.hash).hide();
            });

            $(this).on('click', 'a', function(e) {

                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault();
            });
    });
});
</script>
<!-- add JavaScript here -->
@stack("scripts")