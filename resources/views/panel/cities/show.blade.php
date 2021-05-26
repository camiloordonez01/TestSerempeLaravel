@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>View city</h3>
                </div> 
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Cod</label>
                        <input type="number" name="cod" class="form-control" value="{{$city->cod}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$city->name}}" disabled>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="/cities" class="btn btn-secondary">Return</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection