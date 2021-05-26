@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>List of users</h3>
                    <a href="/users/create" class="btn btn-success"><i class="fad fa-plus"></i> Create</a>
                </div> 
                <div class="card-body">
                    <table class="table table-bordered" id="tableUsers">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>  
                                    <a class="mb-1 btn btn-success" href="{{URL::action('UsersController@show',$user->id)}}">
                                        <i class="fad fa-eye mr-1"></i> 
                                        View
                                    </a> 
                                    <a href="{{URL::action('UsersController@edit',$user->id)}}" class="mb-1 btn btn-info">
                                        <i class="fad fa-pencil mr-1"></i> 
                                        Edit
                                    </a>
                                    <button type="button" class="mb-1 btn btn-danger" data-toggle="modal" data-target="#modal-warning-{{$user->id}}">
                                        <i class="fad fa-trash-alt mr-1"></i>
                                        Delete
                                    </button>
                                    <div class="modal fade show" id="modal-warning-{{$user->id}}" aria-modal="true" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modal-warning-{{$user->id}}Label">Delete user</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                {{Form::Open(array('action'=>array('UsersController@destroy',$user->id),'method'=>'delete'))}}
                                                <div class="modal-body">
                                                <p class="text-center">Confirm if you want to delete the user</p>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-between">
                                                    <button type="button" class="btn btn-primary btn-pill" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger btn-pill">Confirm</button>
                                                </div>
                                                {{Form::Close()}}
                                            </div>
                                        </div>
                                    </div>
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
<script>
    $(document).ready(function (){
        $('#tableUsers').DataTable();
    });
</script>
@endsection