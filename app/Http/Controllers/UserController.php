<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Book;
use App\Helpers\Token;


class UserController extends Controller
{
    //private $token;
    //private $tokenEncode;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userStore(Request $request)
    {
        $user = new User();
        //var_dump($request->name);exit;

        $user->register($request);

        $data_token = [
            "email" => $user->email,
        ];

        $token = new Token($data_token);
        $tokenEncode = $token->encode();
        //$token = JWT::encode($data_token, $this->key);

        return response()->json([
            "token" => $tokenEncode
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUser(User $users)
    {
        $users = User::all();
        foreach ($users as $key => $value) {
            print($value);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /*
    protected function respondWithToken () {
        return response()->json([

            'acces_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 60
        ]);
    }
    */

    public function login(Request $request) {
        
        //$credentials = request(['email', 'password']);
        /*
        if ($token = auth('api')->attempt($credentials)) {
            return response()->json(['error' =>'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
        */
        //$users = User::all();
        //foreach ($users as $key => $user) 
        //{ 
            //if ($request->email == $user->email && $request->password == $user->password) 
            //{
            //}
        //}

        /*$where = [
            'email' => $request->email,
            'password' => $request->password
        ];*/
        $data_token = [
            'email' => $request->email,
        ];

        $user = User::where($data_token)->first();
        
        if($user->password == $request->password)
        {
            
    
            $token = new Token($data_token);
            $tokenEncode = $token->encode();
    
            return response()->json([
                "token" => $tokenEncode
            ], 200);
        }

        return response()->json([
            "message" => "Unauthorized"
        ],401);
    } 

    public function lend(Request $request)
    {
        $token = new Token();
        $header_authorization = $request->header('Authorization');
        $data = $token->decode($header_authorization);

        $user = User::where('email', $data->email)->first();
        // $user = User::find($request->id_user);
        $book = Book::where('id', $request->id_book)->first();
        //var_dump($book->id);exit;

        $user->books()->attach($book->id);

        return 'se ha prestado el libro';
    }
}





// User::find();
       //Buscar el usuario por email 
       //Comprobas que user  de request y email y password de user son iguales
       //si son iguales tengo que codificar el token 
       //despues devolver la respuesta json con el token y un codigo 200
       //si no son iguales devolver la respuesta json con codigo 401