<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class User extends Model 
{

    //private $request;
    //private $user;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];

    public function _construct() 
    {
        //$this->request = $request;
        //$this->user = new User();
    }
    

    public function register($request)
    {
        //var_dump($request->name);exit;
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
    }
}
