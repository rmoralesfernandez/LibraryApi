<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Firebase\JWT\JWT;

class UserController extends Controller
{

    private $key = "example-key";
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
        $user = new User($request);
        $user->register();

        $data_token = [
            "email" => $user->email,
        ];

        $token = JWT::encode($data_token, $this->key);

        return reponse()->json([
            "token" => $token
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $users = User::all('email');

        foreach ($users as $key => $user) 
        { 
            if ($request->email == $user->email) 
            {
                print('hola');     
            }
        }  
    }

    
}





// User::find();
       //Buscar el usuario por email 
       //Comprobas que user  de request y email y password de user son iguales
       //si son iguales tengo que codificar el token 
       //despues devolver la respuesta json con el token y un codigo 200
       //si son iguales devolver la respuesta json con codigo 401