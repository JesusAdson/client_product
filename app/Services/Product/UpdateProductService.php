<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepository;

class UpdateProductService
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
     * @param array $data
     * @return boolean
     */
    public function execute(int $id, array $data): bool
    {
        return $this->product_repository->update($id, [
            'name' => $data['name'],
            'value' => $data['value'],
            'description' => $data['description'] ?? null
        ]);
    }
}