<?php  use App\Models\Properties;  use App\Models\VerifiedUser; use\App\Models\Report; ?>
@extends('layouts.admin')
  @section('content')
  {{--  --}}
  {{-- DataTables --}}
  <link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.min.css')}}">
    <style> .center{ margin-left: auto; margin-right:auto;}</style>
        <div class="container-fluid">
         {{-- <div class="alert alert-success">
          <h2 style="color:rgb(20, 20, 20)">{{$greetings}}, <i style="color: #ffffff">{{ Auth::user()->name}}</i> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></h2>
         </div> --}}
         <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('dashboard')}}"><i class="fas fa-home"></i></a></li>
          </ol>
        </nav>
          @if ( Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
          @endif
          <div class="row">
            {{-- <i class="fas fa-trash-alt"></i> --}}
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-home"></i>
                  </div>
                  <h6 class="card-category text-success">Properties</h6>
                  <h3 class="card-title">{{Properties::all()->count()}}
                    <small>total</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="{{url('/properties')}}" class="dashboardLink btn btn-info">
                      See All <i class="fas fa-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-id-card"></i>
                  </div>
                  {{-- @if ($pendingProperties) --}}
                  <h6 class="card-category text-success">To Verify</h6>
                  <h3 class="card-title">{{VerifiedUser::where('status',0)->count()}}
                    <small>total</small>
                    </h3>
                  {{-- @endif         --}}
                </div>
                <div class="card-footer"> 
                  <div class="stats">
                    <a href="{{route('viewUnverifiedAccount')}}" class="dashboardLink btn btn-info">
                      See All <i class="fas fa-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-users"></i> 
                  </div>
                  <h6 class="card-category text-success">Users</h6>
                  <h3 class="card-title">{{$user->count()}}
                    <small>total</small>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="{{url('users list')}}" class="dashboardLink btn btn-info" >
                      See Users <i class="fas fa-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-secondary card-header-icon">
                  <div class="card-icon">                                                                                                                                             
                    <i class="fas fa-map-marker-alt"></i>
                  </div>
               <h6 class="card-category text-success">Locations</h6>
                  <h3 class="card-title">{{$locations->count()}}
                    <small>total</small>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a class="dashboardLink btn btn-info" href="{{route('locations')}}">
                      See All <i class="fas fa-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>           
          </div>
        </div>
        
        <!--Div that will hold the  pie chart-->
        <div id="chart_div" style="width: 800px; height: 500px;"></div>

        <!--Div that will hold the  pie chart-->
        {{-- <div id="chart_div1"></div> --}}
         {{-- reports --}}    

         {{-- <div id="barchart_values" style="width: 900px; height: 300px;"></div> --}}

      <div class="container pt-5">
         <div class="row">
          <div class="col-md-12">
            <div class="card shadow-md">
              <div class="card-header card-header-danger">
                <h4 class="card-title">Reports Table</h4>
                <p class="">Properties that are reported and waiting for review!</p>
              </div>
              <div class="card-body">
                <table class="center table-bordered border-bold" id="report" style="width:100%">          
                  <thead class="">
                    <tr class="">                      
                      <th class="text-center">Property ID</th>
                      <th class="text-center">Property Name</th>
                      <th class="text-center">Owner's Name</th>                                            
                      <th class="text-center">Report Type</th>                                            
                      <th class="text-center">No. of Reports</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($reports as $report)
                    <tr>                      
                      <td class="text-center">{{$report->property_id}}</td>
                      <td class="text-center">{{$report->properties->name}}</td>
                      <td class="text-center">{{$report->name}}</td>                                      
                      <td class="text-center">{{$report->report_type}}</td>      
                     <td class="text-center">{{$report->offense_count}}</td> 
                      {{-- <td class="text-center">{{Report::where('property_id',$report->property_id)->count()}}</td> --}}
                      <td class="text-center">                        
                        <a href="{{route('viewReport',[$report->id, $report->property_id])}}" class="btn btn-info btn-sm">View</a>                        
                        {{-- <a href="{{route('warnedUser',[$report->id, $report->property_id])}}" class="btn btn-warning btn-sm">Warned User</a> --}}
                        <form action="{{route('deleteReport',[$report->id])}}" method="GET">
                          <button class="btn btn-dark btn-sm" onclick="return confirm('Delete this Report?')"
                           type="submit">Remove</button>
                        </form>
                        <form action="{{route('deleteReportProperty',[$report->property_id])}}" method="GET">
                          <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure you want to delete this reported property?')"
                          type="submit">Delete</button>
                        </form>
                        {{-- <a href="{{route('deleteReport',[$report->id])}}" class="btn btn-dark btn-sm">Remove</a> --}}
                        {{-- <a href="{{route('deleteReportProperty',[$report->id, $report->property_id])}}" class="btn btn-danger btn-sm">Delete</a> --}}
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
          {{-- end reports --}}
@endsection

@push('script')
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  // Load the Visualization API and the corechart package.
  google.charts.load('current', {'packages':['corechart']});

  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);

  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
  function drawChart() {
    // Create the data table.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows([    
      ['House and Lot', {{$houseandlot->count()}}],
      ['Boarding House',{{$boardinghouse->count()}}],
      ['Lot', {{$lot->count()}}],      
    ]);

    // Set chart options
    var options = {'title': 'Total Properties classified in 3 Categories',
                   'width':400, 
                   'height':250};

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
  function drawChart() {  
    // Create the data table.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows([    
      ['House and Lot', {{$houseandlot->count()}}],
      ['Boarding House',{{$boardinghouse->count()}}],
      ['Lot', {{$lot->count()}}],      
    ]);

    // Set chart options
    var options = {'title': 'Total Properties classified in 3 Categories',
                  //  'width':400, 
                  //  'height':250,
                    is3D:true
                  };
                   

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>
<script src="{{asset('datatables/datatables.min.js')}}"></script> 
<script>
  $(document).ready(function(){
    $('#report').DataTable();
  });
</script>
 
  {{-- <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Copper", 8.94, "#b87333"],
        ["Silver", 10.49, "silver"],
        ["Gold", 19.30, "gold"],
        ["Platinum", 21.45, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Density of Precious Metals, in g/cm^3",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
        is3D:true
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script> --}}
@endpush 