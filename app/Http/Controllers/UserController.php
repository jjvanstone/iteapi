<?php

namespace App\Http\Controllers;

use App\Interfaces\Repositories\IUserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller {
    protected $users;

    public function __construct(IUserRepository $users) {
        $this-> users = $users;
    }

    protected function guard() {
        return Auth::guard('api');
    }

    public function getUserFromAccessToken(Request $request) {
        $user = $request->user();

        return response()->json(parent::mapKeys($user->toArray()), 200);
    }

    public function create (Request $request) {
        $result = $this->users->create($request->all());

        return response($result, ($result['result']) ? 200 : 500)
                ->header('Content-Type', 'application/json');
    }

    public function logout(Request $request) {
        if ($this->guard()->check()) {
            $request->user()->token()->revoke();

            $request->session()->flush();
            $request->session()->regenerate();
        }

        return response()->json([
            'result' => true,
            'code' => 200,
            'message' => 'Logout successful'
        ]);
    } 

    public function index () {
        return $this->users->getall();
    }
}