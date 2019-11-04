<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $table ='books';
    protected $filliable = ['id', 'title', 'description'];
}
