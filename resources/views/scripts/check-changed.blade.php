
<script type="text/javascript">

function clicked(){
    $('#btn-change-pw').click(function(event) {
    $('.pw-change-container').slideToggle(10);
    $(this).find('.fa').toggleClass('fa-times');
    $(this).find('.fa').toggleClass('fa-lock');
    $(this).find('.changespan').toggleText('Change Password', 'Cancel');
  });
}
</script>