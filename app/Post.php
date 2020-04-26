<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /*these things are not mandotory */
    //Table Name
    protected $table = 'posts';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
    
}
