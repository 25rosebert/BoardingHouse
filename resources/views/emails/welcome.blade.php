<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Property Finder</title>

    <link rel="stylesheet" href="{{asset('UI/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('UI/css/bootstrap.css')}}">

    <script src="{{ asset('UI/jquery/bootstrap.bundle.js') }}" ></script>
</head>
<body>
    <div class="container">
      <div class="row">
        <h2>Good Day! <span>{{$data['name']}}</span></h2>
          <div class="card">
            <h4 class="text-center text-">You can now register your properties!</h4>
            <div class="card-header">
              <h5>Register and Advertise your Property</h5>
            </div>
            <div class="card-body">
              <div class="col-md-12">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim suscipit consectetur itaque quia delectus facilis officiis nobis autem nesciunt, sapiente quisquam voluptatibus sit ex vel quae natus voluptatum neque est?</p>
                <a href="{{url('/')}}">Click Here</a><p>to redirect to our website</p>
              </div>
              
            </div>
          </div>
      </div>
    </div>
</body>
</html>