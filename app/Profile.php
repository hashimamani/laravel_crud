<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $connection = 'mysql';
    //protected $primaryKey = 'id';
    protected $table = 'profiles';
    protected $fillable = array(

        'name',
        'artist',
        'price'
    );
}
