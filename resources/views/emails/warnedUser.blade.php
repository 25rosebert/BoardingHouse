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
        <h1>Good Day! <span>{{$data['owners_name']}}</span></h1>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2>You're Receiving this email because your Property is Reported 3 times</h2>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        Property Name: <p>{{$data['property_name']}}</p>
                        Report Type: <p>{{$data['report_type']}}</p>
                        Description: <p>{{$data['description']}}</p>
                        Report Count: <p>{{$data['offense_count']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{url('/')}}" class="btn btn-info">Click Here</a> to redirect to our website
</body>

</html>