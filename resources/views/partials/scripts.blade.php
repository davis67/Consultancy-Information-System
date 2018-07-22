<script src="{{  asset('/js/app.js')}}" type="text/javascript"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script> 
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script> 
<script src="{{ asset('/js/toastr.min.js')}}" ></script>
<script src="{{ asset('/js/script.js')}}" ></script>
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