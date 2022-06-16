@extends('layouts.userApp')

@section('content')
<style>
    .card{
         box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
     }
 </style>
    <div class="container">
        <div class="row">
           <div class="col d-flex justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center text-danger" style="font-weight:bold">Contact or Give Us a Feedback</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('feedback')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3 mt-3">
                                <label for="">First Name*</label>
                                <input type="text" name="fname" class="form-control" placeholder="Rose Bert">
                                <span class="errormessage">@error('fname') {{$message}} @enderror</span>
                            </div>
                            <div class="col-md-6 mb-3 mt-3">
                                <label for="">Last Name*</label>
                                <input type="text" name="lname" class="form-control" placeholder="Cantillo">
                                <span class="errormessage">@error('lname') {{$message}} @enderror</span>
                            </div>
                            <div class="col-md-6 mb-3 mt-3">
                                <label for="">E-Mail*</label>
                                <input type="email" name="email" class="form-control" placeholder="myhousing@gmail.com">
                                <span class="errormessage">@error('email') {{$message}} @enderror</span>
                            </div>
                            <div class="col-md-6 mb-3 mt-3">
                                <label for="">Phone*</label>
                                <input type="number" name="phone" class="form-control" placeholder="Contact Number">
                                <span class="errormessage">@error('phone') {{$message}} @enderror</span>
                            </div>
                            <div class="col-md-12 mb-3 mt-3">
                                <label for="">Message*</label>
                                <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Write your query here..."></textarea>
                                <span class="errormessage">@error('message') {{$message}} @enderror</span>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-dark btn-lg">Send Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           </div>
        </div>
    </div>
@endsection