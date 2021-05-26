@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Edit user</h3>
                </div> 
                <div class="card-body">
                {!!Form::model($user,['method'=>'PUT','route'=>['Users.update',$user->id]])!!}
                {{Form::token()}}
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control"  value="{{$user->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="/users" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </div>
                {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection