<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Helpers\Token;


class User extends Model 
{

    //private $request;
    //private $user;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];
    
    public function books()
    {
        return $this->belongsToMany('App\book','lend', 'id_user', 'id_book')->withTimestamps();
    }

    public function register(Request $request)
    {
        //var_dump($request->name);exit;
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
    }

    public static function by_field($key, $value)
    {
        $users = self::where($key, $value)->get();
        foreach ($users as $key => $user)
        {
            return $user;
        }
    }
    public function is_authorized(Request $request)
    {
        $token = new Token();
        $header_authorization = $request->header('Authorization');
        if (!isset($header_authorization))
        {
            return false;
        }
        $data = $token->decode($header_authorization);
        return !empty(self::by_field('email', $data->email));
    }
}
