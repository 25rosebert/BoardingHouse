@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>What classification</h4>
            <form action="{{url('store-classification')}}" method="POST">
                @csrf
                <div class="col md-12">
                    <input type="text" class="form-control" name="type">
                    <span style="color: red">
                        @error('type')
                         {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="col md-12">
                   <button class="btn btn-success btn-sm">Submit</button>
                </div>
            </form>
        </div>
    </div>
       
    
@endsection