<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Repositories\BaseRepository;
use App\Interfaces\Repositories\IUserRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements IUserRepository
{
    protected $model;

    public function __construct() {
        $this->model = new User();
    }

    public function create ($data) {
        $this->model = new User();

        $this->model->fill($data);
        $this->model->id = uniqid('', true);
        $this->model->password = Hash::make($data['password']);

        return ['result' => $this->model->save(), 'id' => $this->model->id];
    }
}