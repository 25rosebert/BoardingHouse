@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Classification</h1>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-stripe">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classifications as $item)
                        <tr>
                            <td>{{$item->id}}</td>    
                            <td>{{$item->type}}</td>    
                            
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection