<?php

namespace App\Services\Client;

use App\Repositories\Client\ClientRepository;
use App\Services\Invoice\CreateInvoiceService;
use App\Services\ClientProduct\CreateClientProductService;

class CreateClientService
{
    /**
     * @var ClientRepository
     */
    private ClientRepository $client_repository;

    /**
     * @var CreateClientProductService
     */
    private CreateClientProductService $create_client_product_service;

    /**
     * @var CreateInvoiceService
     */
    private CreateInvoiceService $create_invoice_service;

    /**
     * @param ClientRepository $client_repository
     */
    public function __construct(
        ClientRepository $client_repository, 
        CreateClientProductService $create_client_product_service,
        CreateInvoiceService $create_invoice_service
    )
    {
        $this->client_repository = $client_repository;
        $this->create_client_product_service = $create_client_product_service;
        $this->create_invoice_service = $create_invoice_service;
    }

    public function execute(array $data)
    {
        $client = $this->client_repository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone']
        ]);
        
        if (isset($data['products']) && count($data['products']) > 0) {
            foreach ($data['products'] as $product) {
                $this->create_client_product_service->execute($product, $client->id);
            }
        } 
        
        if (isset($data['invoice_total'])) {
            $this->create_invoice_service->execute($client->id, $data['invoice_total']);
        }
        
        return $client;
    }
}