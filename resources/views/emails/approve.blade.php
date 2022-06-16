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
    <h1>Good Day! <span>{{$data['name']}}</span></h1>
    <h3>Your Property is Added Successfully!</h3>
    <p>{{$data['property_name']}}</p>
      <p>{{$data['price']}}</p>
      <p>{{$data['description']}}</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, dignissimos, delectus dolor ipsum vero earum nemo quidem veniam necessitatibus eius hic totam officiis autem laudantium eligendi inventore deleniti asperiores rerum?
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem laborum molestias sequi rem tempora, voluptates nulla! Eligendi et repellendus vel, placeat odio dolore doloribus eveniet? Iusto beatae doloremque adipisci praesentium.
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio odit quibusdam, corrupti quo aliquam suscipit dolores. Quam corrupti accusamus distinctio enim sint! Rerum praesentium laboriosam necessitatibus aspernatur deleniti voluptatem nihil.
    </p>

    <a href="{{url('/')}}">Click Here</a><p>to redirect to our website</p>
</body>
</html>