
{{-- Message --}}
@if (Session::has('success'))
{{--    <div class="alert alert-success alert-dismissible" role="alert">--}}
{{--        <button type="button" class="close" data-dismiss="alert">--}}
{{--            <i class="fa fa-times"></i>--}}
{{--        </button>--}}
{{--        <strong>Success !</strong> {{ session('success') }}--}}
{{--    </div>--}}
    <script>
            $.NotificationApp.send("Success !","{{ session('success') }}","top-right","rgba(0,0,0,0.2)","success")
    </script>
@endif

@if (Session::has('error'))
{{--    <div class="position-absolute  ">--}}
{{--        <div class="alert alert-danger top-0 end-0" role="alert">--}}
{{--            <i class="dripicons-wrong me-2"></i> <strong>Error !</strong> {{ session('error') }}--}}
{{--        </div>--}}
{{--    </div>--}}
    <script>
        $.NotificationApp.send("Error !","{{ session('error') }}","top-right","rgba(0,0,0,0.2)","error")
    </script>
@endif


