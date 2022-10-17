<?php

namespace App\Services\Product;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Product\ProductRepository;

class ShowProductService
{
    /**
     * @var ProductRepository
     */
    private ProductRepository $product_repository;

    /**
     * @param ProductRepository $product_repository
     */
    public function __construct(ProductRepository $product_repository)
    {
        $this->product_repository = $product_repository;
    }

    /**
     * It returns all clients on the database
     *
     * @return ?Model
     */
    public function execute(int $id): ?Model
    {
       return $this->product_repository->getByIdWithRelationships($id);
    }
}