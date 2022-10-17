<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
    /**
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function getAll()
    {
        return $this->model
            ->query()
            ->orderBy('name', 'asc')
            ->get();
    }

    public function getByClient(int $id)
    {
        return $this->model
            ->query()
            ->whereHas('clientProduct', function ($query) use ($id) {
                return $query->where('client_id', $id);
            })
            ->get();
    }
}