<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
<script src="{{asset('js/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/config.js')}}" type="text/javascript"></script>
<script src="{{asset('js/scripts.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('js/custom.js')}}" type="text/javascript"></script>
<script>
    var _token = "{{ csrf_token() }}";
    var $window = $(window);
    $window.on('load', function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });
    $(document).ready(function(){
        <?php
        if (session('status')){
        ?>
        notification("{{session('status')}}","{{session('message')}}");
        <?php
        }
        ?>
        <?php
        if (session('success')){
        ?>
        notification("success","{{session('success')}}");
        <?php
        }
        ?>
        <?php
        if (session('error')){
        ?>
        notification("error","{{session('message')}}");
        <?php
        }
        ?>
    });
</script>
@stack('scripts') <!-- Load Scripts Dynamically -->
