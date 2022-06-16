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
    <link rel="stylesheet" href="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/errorMessage.css')}}">
    <link rel="stylesheet" href="{{ asset('css/landingpage.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
    {{-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> --}}    
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/navStyle.css')}}">  
    <link rel="stylesheet" href="{{asset('css/card.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('package/dist/sweetalert2.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/previewImg.css')}}"> --}}
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS only -->
    
    <link rel="stylesheet" href="{{asset('css/slider/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slider/owl.theme.default.min.css')}}">

    @yield('css')
</head>
<body class="my-login-page">
    <div id="userApp">
     @include('layouts.inc.appNav') <!-- You Can find this on, layouts/inc/ folder --> 
     {{-- @include('layouts.inc.carousel') --}}
        <main class="py-4">
            @yield('content')
        </main>
        @include('layouts.inc.homefooter')
    </div>


<!-- Scripts -->
    <script src="{{ asset('UI/jquery/jquery-3.6.0.min.js') }}" ></script>  
    <script src="{{ asset('UI/jquery/bootstrap.bundle.js') }}" ></script>
    <script scr="{{asset('js/owl.corousel.min.js')}}"></script>
    <script src="{{asset('js/sweetalert2.js')}}"></script>
    {{-- <script src="{{asset('package/dist/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('package/dist/sweetalert2.min.js')}}"></script> --}}
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src="{{asset('admin/js/popper.min.js')}}"></script>
    <script src="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
    <script src="{{asset('js/slider/jquery.js')}}"></script>
    <script src="{{asset('js/slider/owl.carousel.min.js')}}"></script>

    @if (session('status'))
    <script>
        swal("{{session('status')}}");
    </script>
  @endif

    {{-- <script>   //Map Script       
    function initMap() {
      var location = {lat: 16.1505, lng: 119.9856};
      var map = new google.maps.Map(document.getElementById("myMap"),{
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
    items: 3,
    nav: true,
    loop: true,
    animateOut:'fadeOut',
    responsive:{
      0:{
        items:1,
        dots: false,
      },
      485:{
        items:2,
        dots: false,
      },
      728:{
        items:3,
        dots: false,
      },
      960:{
        items:3,
        dots: false,
      },
      1200:{
        items:3,
        dots: true,
      }
    }
  
  });
  </script>
  
<script>
  document.querySelectorAll('.img-container img').forEach(image =>{
      image.onclick = () =>{
      document.querySelector('.popup-img').style.display = 'block';
      document.querySelector('.popup-img img').src = image.getAttribute('src');
      }
  });
  document.querySelector('.popup-img span').onclick=() =>{
      document.querySelector('.popup-img').style.display = 'none';
  }
</script>
  </body>
</html>
