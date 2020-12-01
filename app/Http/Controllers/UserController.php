<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\BruteForceController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App;

class UserController extends Controller {
    protected $request;
    public function __construct(Request $request) {
        date_default_timezone_set('America/Sao_Paulo');
        $this->request = $request;
       
    }
    public function login() {
        try {
        
            return \Response::json([
                'status' => 200,
                'iduser' =>"",
                'idsite' =>"",
                'token' => "",
                'msg' => 'Successfully Logins.',
                    ], 201);

        } catch (\Exception $e) {
            return \Response::json([
                        'status' => 401,
                        'message' => 'Error in operation !' . $e,
                            ], 401);
        }
    }

    }