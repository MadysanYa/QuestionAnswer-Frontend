<?php

namespace App\Repositories;

use App\Models\Test;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class TestRepository.
 */
class TestRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Test::class;
    }

    public function findById($id) 
    {
        return $this->model->find($id);
    }
}
