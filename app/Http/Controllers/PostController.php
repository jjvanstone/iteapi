<?php

namespace App\Http\Controllers;

use App\Interfaces\Repositories\IPostRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller {
    protected $posts;

    public function __construct(IPostRepository $posts) {
        $this-> posts = $posts;
    }

    protected function guard() {
        return Auth::guard('api');
    }

    public function create (Request $request) {
        $result = $this->posts->create($request->all());

        return response($result, ($result['result']) ? 200 : 500)
                ->header('Content-Type', 'application/json');
    }

    public function index () {
        return $this->posts->getAllWithUsers();
    }
}