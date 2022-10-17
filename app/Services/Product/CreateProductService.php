<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepository;
use Illuminate\Database\Eloquent\Model;

class CreateProductService
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
     * @param array $data
     * @return Model|null
     */
    public function execute(array $data): ?Model
    {
        return $this->product_repository->create([
            'name' => $data['name'],
            'value' => $data['value'],
            'description' => $data['description'] ?? null
        ]);
    }
}