<?php

namespace App\Services\ClientProduct;

use App\Repositories\Client\ClientRepository;
use App\Repositories\ClientProduct\ClientProductRepository;
use App\Repositories\Product\ProductRepository;

class CreateClientProductService
{
    /**
     * @var ProductRepository
     */
    private ProductRepository $product_repository;

    /**
     * @var ClientRepository
     */
    private ClientRepository $client_repository;

    /**
     * @param ProductRepository $product_repository
     */
    public function __construct(
        ProductRepository $product_repository, 
        ClientRepository $client_repository
    )
    {
        $this->product_repository = $product_repository;
        $this->client_repository = $client_repository;
    }

    public function execute($product_id, $client_id)
    {
        $product = $this->product_repository->getById($product_id);

        $client = $this->client_repository->getById($client_id);
            
        $product->clients()->attach($client);
        
        return true;
    }
}