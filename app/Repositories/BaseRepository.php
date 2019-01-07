<?php

namespace App\Repositories;

use Illimunate\Support\Facades\Log;

abstract class BaseRepository 
{
    protected $model;

    public function getAll() {
        $returnData = $this->model->all();

        return $returnData;
    }
}