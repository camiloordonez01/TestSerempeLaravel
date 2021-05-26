@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Filtrar por ciudad:</label>
                <select name="cities_id" class="form-control" id="city">
                    <option value="" selected disabled>Select city</option>
                    @foreach($cities as $city)
                    <option value="{{$city->name}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>List of clients</h3>
                    <a href="/clients/create" class="btn btn-success"><i class="fad fa-plus"></i> Create</a>
                </div> 
                <div class="card-body">
                    <table class="table table-bordered" id="tableClients">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Cod</th>
                                <th>Name</th>
                                <th>City</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td>{{$client->id}}</td>
                                <td>{{$client->cod}}</td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->city}}</td>
                                <td>  
                                    <a class="mb-1 btn btn-success" href="{{URL::action('ClientsController@show',$client->id)}}">
                                        <i class="fad fa-eye mr-1"></i> 
                                        View
                                    </a> 
                                    <a href="{{URL::action('ClientsController@edit',$client->id)}}" class="mb-1 btn btn-info">
                                        <i class="fad fa-pencil mr-1"></i> 
                                        Edit
                                    </a>
                                    <button type="button" class="mb-1 btn btn-danger" data-toggle="modal" data-target="#modal-warning-{{$client->id}}">
                                        <i class="fad fa-trash-alt mr-1"></i>
                                        Delete
                                    </button>
                                    <div class="modal fade show" id="modal-warning-{{$client->id}}" aria-modal="true" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modal-warning-{{$client->id}}Label">Delete client</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                {{Form::Open(array('action'=>array('ClientsController@destroy',$client->id),'method'=>'delete'))}}
                                                <div class="modal-body">
                                                <p class="text-center">Confirm if you want to delete the client "{{$client->name}}"</p>
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
        var table = $('#tableClients').DataTable();
        $('#city').change(function(){
            var val = $.fn.dataTable.util.escapeRegex(
                $('#city').val()
            );
            table.search( val ? val : '', true, false ).draw();
        });
    });
</script>
@endsection