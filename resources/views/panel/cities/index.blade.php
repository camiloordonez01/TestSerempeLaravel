@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>List of cities</h3>
                    <a href="/cities/create" class="btn btn-success"><i class="fad fa-plus"></i> Create</a>
                </div> 
                <div class="card-body">
                    <table class="table table-bordered" id="tableCities">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Cod</th>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cities as $city)
                            <tr>
                                <td>{{$city->id}}</td>
                                <td>{{$city->cod}}</td>
                                <td>{{$city->name}}</td>
                                <td>  
                                    <a class="mb-1 btn btn-success" href="{{URL::action('CitiesController@show',$city->id)}}">
                                        <i class="fad fa-eye mr-1"></i> 
                                        View
                                    </a> 
                                    <a href="{{URL::action('CitiesController@edit',$city->id)}}" class="mb-1 btn btn-info">
                                        <i class="fad fa-pencil mr-1"></i> 
                                        Edit
                                    </a>
                                    <button type="button" class="mb-1 btn btn-danger" data-toggle="modal" data-target="#modal-warning-{{$city->id}}">
                                        <i class="fad fa-trash-alt mr-1"></i>
                                        Delete
                                    </button>
                                    <div class="modal fade show" id="modal-warning-{{$city->id}}" aria-modal="true" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modal-warning-{{$city->id}}Label">Delete city</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                {{Form::Open(array('action'=>array('CitiesController@destroy',$city->id),'method'=>'delete'))}}
                                                <div class="modal-body">
                                                <p class="text-center">Confirm if you want to delete the city {{$city->name}}</p>
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
        $('#tableCities').DataTable();
    });
</script>
@endsection