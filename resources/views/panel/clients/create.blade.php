@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Create client</h3>
                </div> 
                <div class="card-body">
                {!!Form::open(array('url'=> 'clients/store','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                    <div class="form-group">
                        <label for="">Cod</label>
                        <input type="number" name="cod" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">City</label>
                        <select name="cities_id" class="form-control" required>
                            <option value="" selected disabled>Select city</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="/clients" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </div>
                {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection