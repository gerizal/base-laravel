</div>
<!-- jQuery 3 -->
<script src="{{ asset('themes/AdminLTE/2.4.2/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('themes/AdminLTE/2.4.2/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('themes/AdminLTE/2.4.2/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('themes/AdminLTE/2.4.2/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- dataTables -->
<script src="{{ asset('themes/AdminLTE/2.4.2/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('themes/AdminLTE/2.4.2/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- validator form -->
<script src="{{ asset('js/jquery.form-validator.min.js') }}"></script>
  
@yield('scripts')
@stack('scripts')

<script>
  function onElementHeightChange(elm, callback) {
        var lastHeight = elm.clientHeight, newHeight;
        (function run() {
            newHeight = elm.clientHeight;
            if (lastHeight != newHeight)
                callback();
            lastHeight = newHeight;

            if (elm.onElementHeightChangeTimer)
                clearTimeout(elm.onElementHeightChangeTimer);

            elm.onElementHeightChangeTimer = setTimeout(run, 200);
        })();
    }



</script>