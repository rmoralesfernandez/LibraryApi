<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $table ='books';
    protected $filliable = ['id', 'title', 'description'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_lend_books');
    }
}
