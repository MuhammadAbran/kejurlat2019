<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- Toastr style -->
  <link href="{{ asset('master/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

  <link href="{{ asset('master/css/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('master/css/style.css') }}" rel="stylesheet">
   <title>Document</title>
</head>
<body>
   @if(Auth::user()->role)
      INI Dashboard Admin
   @else
      INI Dashboard User
   @endif

<!-- Mainly scripts -->
<script src="{{ asset('master/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('master/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('master/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('master/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('master/js/inspinia.js') }}"></script>
<script src="{{ asset('master/js/plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('master/js/plugins/wow/wow.min.js') }}"></script>
<script src="{{ asset('master/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Toastr script -->
<script src="{{ asset('master/js/plugins/toastr/toastr.min.js') }}"></script>
@if (Session::has('msg'))

    <script>
        $(document).ready(function() {
           toastr.options = {
               closeButton: true,
               progressBar: true,
               preventDuplicates: true,
               positionClass: 'toast-top-right',
           };
           toastr.warning('{{ Session::get('msg') }}', 'WARNING');

        });
    </script>

@endif
</body>
</html>
