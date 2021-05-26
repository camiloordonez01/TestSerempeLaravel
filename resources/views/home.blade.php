@extends('layouts.app')

@section('content')
<style>
    a,a:hover{
        list-style: none;
        text-decoration: none;
        color: inherit;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <a href="/users">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="fad fa-users display-1"></i>
                        <h1>Users</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="/cities">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="fad fa-city display-1"></i>
                        <h1>Cities</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="/clients">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="fad fa-user-tie display-1"></i>
                        <h1>Clients</h1>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
