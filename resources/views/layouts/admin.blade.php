<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
 
       <!-- Styles -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
       {{-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> --}}
       <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
       <link rel="stylesheet" href="{{asset("admin/css/material-dashboard.css")}}">
       <link rel="stylesheet" href="{{asset('admin/css/material-dashboard.min.css')}}">
       <link rel="stylesheet" href="{{asset('plugins/ijaboCropTool/ijaboCropTool.min.css') }}">
       <link rel="stylesheet" href="{{asset('UI/css/bootstrap.min.css')}}">
       <link rel="stylesheet" href="{{asset('css/errorMessage.css')}}">
       <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
       <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
       {{-- <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">      --}}
       {{-- <link rel="stylesheet" href="{{asset('admin/css/map.css')}}"> --}}
      @yield('css') 
</head>
<body> 
  <div class="wrapper">
    @include('layouts.inc.sidebar')
    <div class="main-panel">
        @include('layouts.inc.adminnav')
        <div class="content">
            @yield('content')
        </div>
        @include('layouts.inc.footer')
    </div>
</div>
    <!-- Scripts -->  
  <script src="{{asset('js/jquery.min.js')}}"></script>
  {{-- <script src="{{ asset('UI/jquery/jquery-3.6.0.min.js') }}" ></script>   --}}
  <script src="{{asset('admin/js/popper.min.js')}}"></script>
  <script src="{{asset('admin/js/bootstrap-material-design.min.js')}}"></script>
  <script src="{{asset('admin/js/perfect-scrollbar.jquery.min.js')}}"></script>
  <script src="{{asset('js/sweetalert2.js')}}"></script>
  {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
  {{-- <script src="{{asset('package/dist/sweetalert2.all.min.js')}}"></script>
  <script src="{{asset('package/dist/sweetalert2.min.js')}}"></script> --}}
  <script scr="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js"></script>
  <script src="{{asset('UI/jquery/bootstrap.bundle.js') }}"></script>
  <script src="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script> 
  <link rel="stylesheet" href="{{asset('package/dist/sweetalert2.min.css')}}">
  @if (session('status'))
    <script>
        swal("{{session('status')}}");
    </script>
  @endif
  @yield('scripts')
 {{-- <script src="{{asset('admin/js/ajaxProfile.js')}}"></script> --}}

 <script>

$.ajaxSetup({
     headers:{
       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }  
  });
  
  $(function(){

    /* UPDATE ADMIN PERSONAL INFO */

    $('#AdminInfoForm').on('submit', function(e){
        e.preventDefault();

        $.ajax({
           url:$(this).attr('action'),
           method:$(this).attr('method'),
           data:new FormData(this),
           processData:false,
           dataType:'json',
           contentType:false,
           beforeSend:function(){
               $(document).find('span.error-text').text('');
           },
           success:function(data){
                if(data.status == 0){
                  $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                  });
                }else{
                  $('.admin_name').each(function(){
                     $(this).html( $('#AdminInfoForm').find( $('input[name="name"]') ).val() );
                  });
                  alert(data.msg);
                }
           }
        });
    });


      //Image 
      $(document).on('click','#change_picture_btn', function(){
        $('#admin_image').click();
      });
  
      $('#admin_image').ijaboCropTool({
            preview : '.admin_picture',
            setRatio:1,
            allowedExtensions: ['jpg', 'jpeg','png'],
            buttonsText:['CROP','QUIT'],
            buttonsColor:['#30bf7d','#ee5155', -15],
            processUrl:'{{ route("adminPictureUpdate") }}',
            //  withCSRF:['_token','{{ csrf_token() }}'],
            onSuccess:function(message, element, status){
               alert(message);
            },
            onError:function(message, element, status){
              alert(message);
            }
         });

    //Change Password
    $('#changePasswordAdminForm').on('submit', function(e){
         e.preventDefault();

         $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
            success:function(data){
              if(data.status == 0){
                $.each(data.error, function(prefix, val){
                  $('span.'+prefix+'_error').text(val[0]);
                });
              }else{
                $('#changePasswordAdminForm')[0].reset();
                alert(data.msg);
              }
            }
         });
    });
  });


 </script>
 

 @stack('script')

