<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepository;

class DeleteProductService
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
     * @param integer $id
     * @return boolean|null
     */
    public function execute(int $id): ?bool
    {
        return $this->product_repository->delete($id);
    }
}