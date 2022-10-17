<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchProductService
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
     * @return LengthAwarePaginator
     */
    public function execute(string $name): LengthAwarePaginator
    {
       return $this->product_repository->getByName($name);
    }
}