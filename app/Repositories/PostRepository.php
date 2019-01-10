<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Repositories\BaseRepository;
use App\Interfaces\Repositories\IPostRepository;
use App\Models\Post;

class PostRepository extends BaseRepository implements IPostRepository
{
    protected $model;

    public function __construct() {
        $this->model = new Post();
    }

    public function create ($data) {
        $this->model = new Post();
        $this->model->id = uniqid('', true);
        $this->model->fill($data);

        return ['result' => $this->model->save(), 'id' => $this->model->id];
    }

    public function getAllWithUsers() {
        return $this->model::orderByDesc('created_at')->with('user')->get();
    }
}