<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class User extends Model 
{

    private $request;
    private $user;

    public function _construc(Request $request) 
    {
        $this->request= $request;
        $this->user= new User();
    }

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function create (Request $request)
    {
        $this->user->name = $this->request->name;
        $this->user->email = $this->request->email;
        $this->user->password = $this->request->password;
        $this->user->save();
    }
}
