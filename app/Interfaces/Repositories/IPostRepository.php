<?php

namespace App\Interfaces\Repositories;

use App\Interfaces\Repositories\IBaseRepository;

interface IPostRepository extends IBaseRepository
{
    public function create($data);
}