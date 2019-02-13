<script type="text/javascript">
  $.validate({
   
  });
  function updateCountdown() {
        // 140 is the max message length
        var remaining = 255 - jQuery('#description').val().length;
        jQuery('.countdown').text(remaining + ' characters remaining.');
    }

    jQuery(document).ready(function($) {
        updateCountdown();
        $('#description').change(updateCountdown);
        $('#description').keyup(updateCountdown);
    });
$(document).ready(function () {
    $('#checkBtn').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("You must check at least one checkbox.");
        return false;
      }

    });
});

</script>
<script language="JavaScript">
function toggle(source) {
	checkboxes = document.getElementsByName('permission[]');
	for(var i=0, n=checkboxes.length;i<n;i++) {
	checkboxes[i].checked = source.checked;
	}
}
</script>