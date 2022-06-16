<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <hr>
              <h4 class="card-title ">House and Lot</h4>
              <hr>
                <table>
                  <thead>
                    <tr>
                      {{-- <th class="text-center">ID</th> --}}
                      <th class="text-center">Property Name</th>
                      <th class="text-center">Address</th>
                      <th class="text-xcenter">Price</th>
                      <th class="text-center">Category</th>
                      <th class="text-center">Type</th>
                      <th class="text-center">Agent</th>
                      <th class="text-center">Contact_info</th>
                      <th class="text-center">Description</th>
                    </tr>
                  </thead>
                  <tbody>
                 
                    @foreach ($properties as $property)
                      <tr>
                        {{-- <td>{{$property->id}}</td> --}}
                        <td>{{$property->name}}</td>
                        <td>{{$property->locations->address}}</td> 
                        <td>{{$property->price}}</td>
                        <td>{{$property->category->name}}</td>
                        <td>{{$property->classification->type}}</td>
                        <td>{{$property->user->name}}</td>
                        <td>+{{$property->phone}}</td>
                        <td>{{$property->description}}</td>                               
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <hr>
            <h4 class="card-title ">Boarding House Table</h4>
            <hr>

              <table class="table table-hover" id="propertyTable">
                <thead>
                  <tr>
                    {{-- <th class="text-center">ID</th> --}}
                    <th class="text-center">Property Name</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">Agent</th>
                    <th class="text-center">Contact_info</th>
                    <th class="text-center">Description</th>
                
                  </tr>
                </thead>
                <tbody>
                  @foreach ($properties_board as $property)
                    <tr>
                      {{-- <td>{{$property->id}}</td> --}}
                      <td>{{$property->name}}</td>
                      <td>{{$property->locations->address}}</td> 
                      <td>{{$property->price}}</td>
                      <td>{{$property->category->name}}</td>
                      <td>{{$property->classification->type}}</td>
                      <td>{{$property->user->name}}</td>
                      <td>+{{$property->phone}}</td>
                      <td>{{$property->description}}</td>                      
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <hr>
          <h4 class="card-title ">Lots Table</h4>
         <hr>
            <table>
              <thead>
                <tr>
                  {{-- <th class="text-center">ID</th> --}}
                  <th class="text-center">Property Name</th>
                  <th class="text-center">Address</th>
                  <th class="text-center">Price</th>
                  {{-- <th>Total Land Area</th> --}}
                  <th class="text-center">Category</th>
                  <th class="text-center">Type</th>
                  <th class="text-center">Agent</th>
                  <th class="text-center">Contact_info</th>
                  <th class="text-center">Description</th>
                 
                </tr>
              </thead>
              <tbody>
             
                @foreach ($properties_lot as $property)
                  <tr>
                    {{-- <td>{{$property->id}}</td> --}}
                    <td>{{$property->name}}</td>
                    <td>{{$property->locations->address}}</td> 
                    <td>{{$property->price}}</td>
                    {{-- <td>{{$property->lot->land_size}}</td> --}}
                    <td>{{$property->category->name}}</td>
                    <td>{{$property->classification->type}}</td>
                    <td>{{$property->user->name}}</td>
                    <td>+{{$property->phone}}</td>
                    <td>{{$property->description}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

</body>
</html>