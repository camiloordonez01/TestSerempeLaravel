@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Create city</h3>
                </div> 
                <div class="card-body">
                {!!Form::open(array('url'=> 'cities/store','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                    <div class="form-group">
                        <label for="">Cod</label>
                        <input type="number" name="cod" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="/cities" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </div>
                {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection