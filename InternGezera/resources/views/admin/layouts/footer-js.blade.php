<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{URL::asset('assetsAdmin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{URL::asset('assetsAdmin/bootstrap/js/popper.min.js')}}"></script>
<script src="{{URL::asset('assetsAdmin/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('assetsAdmin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{URL::asset('assetsAdmin/assets/js/app.js')}}"></script>
<script src="{{URL::asset('assetsAdmin/assets/js/fontawesome.js')}}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{URL::asset('assetsAdmin/assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<!-- Confirm Delete -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{URL::asset('assetsAdmin/shared/actions.js')}}"></script>
<!-- Confirm Delete -->
@include('sweetalert::alert')
@yield('js')
