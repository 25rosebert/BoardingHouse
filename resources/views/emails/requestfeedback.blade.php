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
        <h1>Good Day! <span>{{$data['name']}}</span></h1>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2>Pending Request Please Wait for the Approval</h2>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <p>Property Name: {{$data['property_name']}}</p>
                        <p>Price: {{$data['price']}}</p>
                        Description:
                        <p>{{$data['description']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{url('/')}}" class="btn btn-info">Click Here</a> to redirect to our website
</body>

</html>