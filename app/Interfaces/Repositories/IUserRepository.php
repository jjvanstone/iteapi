<?php

namespace App\Interfaces\Repositories;

use App\Interfaces\Repositories\IBaseRepository;

interface IUserRepository extends IBaseRepository
{
    public function create($data);
}