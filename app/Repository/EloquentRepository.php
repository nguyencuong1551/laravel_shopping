<?php

namespace App\Repository;

use App\Product;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        //gán biến model = app() là lấy ra các phương thức all find .. cho $this->getModel
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        $result = $this->model->all();

        return $result;
    }

    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    public function create(array $attributes)
    {
        $result = $this->model->create($attributes);

        return $result;
    }

    public function update(array $attributes, $id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);

            return $result;
        } else {

            return false;
        }
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        } else {

            return false;
        }
    }
}


