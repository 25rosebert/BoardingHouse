<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('UI/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('UI/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/my-login.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.css') }}">
     <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/navStyle.css')}}">  
    <link rel="stylesheet" href="{{ asset('css/errorMessage.css')}}">
    <link rel="stylesheet" href="{{ asset('css/landingpage.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    {{-- <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('package/dist/sweetalert2.min.css')}}">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"> --}}

    @yield('css')
</head>
<body class="my-login-page">
    <div id="app">
     @include('layouts.inc.authUserNav') <!-- You Can find this on, layouts/inc/ folder --> 
        <main class="py-4">
            @yield('content')
        </main>
      @include('layouts.inc.homefooter')
    </div>


<!-- Scripts -->
    <script src="{{ asset('UI/jquery/jquery-3.6.0.min.js') }}" ></script>  
    <script src="{{ asset('UI/jquery/bootstrap.bundle.js') }}" ></script>
    {{-- <script src="{{asset('js/my-login.js')}}"></script> --}}
    <script src="{{asset('js/sweetalert2.js')}}"></script>
    {{-- <script src="{{asset('package/dist/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('package/dist/sweetalert2.min.js')}}"></script> --}}
    <script src="{{asset('admin/js/popper.min.js')}}"></script>
    <script src="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script> --}}

    {{-- <script src="{{asset('js/bootstrap.js')}}"></script> --}}
    {{-- <script src="{{asset('js/popper.min.js')}}"></script> --}}
    {{-- <script scr="{{asset('js/getLocation.js')}}"></script> --}}
    @if (session('status'))
    <script>
        swal("{{session('status')}}");
    </script>
  @endif

    {{-- <script>   //Map Script       
    function initMap() {
      var location = {lat: 16.1505, lng: 119.9856};
      var map = new google.maps.Map(document.getElementById("myMapMap"),{
          zoom: 15, 
          center: location,
          mapTypeId: google.maps.MapTypeId.ROADMAP 
      });
       var marker = new google.maps.Marker({
           position: location, 
           map: map, 
           draggable: true
       });
    google.maps.event.addListener(marker, 'position_changed',
    function(){
      var lat = marker.position.lat()
      var lng = marker.position.lng()
      $('#latitude').val(lat)
      $('#longitude').val(lng)
    });
    // infoWindow = new google.maps.InfoWindow({});
    
  }
    </script> --}}

    @stack('script')

    
 
{{-- Ajax Code for Updating a user profile --}}
<script>

    $.ajaxSetup({
       headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
       }  
    });
    
    $(function(){
  
      /* UPDATE USER PERSONAL INFO */
      $('#userInfoForm').on('submit', function(e){
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
                  $('.user_name').each(function(){
                     $(this).html( $('#userInfoForm').find( $('input[name="name"]') ).val() );
                  });
                  alert(data.msg);
                }
           }
        });
    });
  
  
  
    //Image 
      $(document).on('click','#change_picture_btn', function(){
        $('#user_image').click();
      });
  
      $('#user_image').ijaboCropTool({
            preview : '.user_picture',
            setRatio:1,
            allowedExtensions: ['jpg', 'jpeg','png'],
            buttonsText:['CROP','QUIT'],
            buttonsColor:['#30bf7d','#ee5155', -15],
            processUrl:'{{ route("updateUserPicture") }}',
            //  withCSRF:['_token','{{ csrf_token() }}'],
            onSuccess:function(message, element, status){
               alert(message);
            },
            onError:function(message, element, status){
              alert(message);
            }
         });
  
        //Change Password 
        $('#changePasswordUserForm').on('submit', function(e){
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
                  $('#changePasswordUserForm')[0].reset();
                  alert(data.msg);
                }
              }
           });
      });
      
    });

    // owl-carousel
$(".owl-carousel").owlCarousel({
    autoplay: true,
    autoplayhoverpause: true,
    autoplaytimeout: 100,
    items: 4,
    nav: true,
    loop: true,
    animateOut:'fadeOut',
    responsive:{
      0:{
        items:1,
        dots: false,
      },
      485:{
        items:4,
        dots: false,
      },
      728:{
        items:4,
        dots: false,
      },
      960:{
        items:4,
        dots: false,
      },
      1200:{
        items:4,
        dots: true,
      }
    }
  
  });
  </script>
  </body>
</html>
