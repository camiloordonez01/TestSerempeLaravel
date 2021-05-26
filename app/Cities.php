<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table= 'cities';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'cod',
        'name',
    ];
}
