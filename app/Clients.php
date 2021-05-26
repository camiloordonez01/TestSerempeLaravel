<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table= 'client';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'cod',
        'name',
        'cities_id',
    ];
}