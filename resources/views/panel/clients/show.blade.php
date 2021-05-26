@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>View client</h3>
                </div> 
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Cod</label>
                        <input type="number" name="cod" class="form-control" value="{{$client->cod}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$client->name}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">City</label>
                        <select name="cities_id" class="form-control" disabled>
                            <option value="" selected disabled>Select city</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}" @if($client->cities_id==$city->id) selected @endif>{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="/clients" class="btn btn-secondary">Return</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection