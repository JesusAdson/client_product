<?php

namespace App\Services\Client;

use App\Repositories\Client\ClientRepository;
use App\Services\ClientProduct\CreateClientProductService;
use App\Repositories\ClientProduct\ClientProductRepository;
use App\Services\Invoice\CreateInvoiceService;

class UpdateClientService
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
     * @var ClientProductRepository
     */
    private ClientProductRepository $client_product_repository;

    /**
     * @var CreateInvoiceService
     */
    private CreateInvoiceService $create_invoice_service;

    /**
     * @param ClientRepository $client_repository
     * @param CreateClientProductService $create_client_product_service
     * @param ClientProductRepository $client_product_repository
     * @param CreateInvoiceService $create_invoice_service
     */
    public function __construct(
        ClientRepository $client_repository, 
        CreateClientProductService $create_client_product_service,
        ClientProductRepository $client_product_repository,
        CreateInvoiceService $create_invoice_service
    )
    {
        $this->client_repository = $client_repository;
        $this->create_client_product_service = $create_client_product_service;
        $this->client_product_repository = $client_product_repository;
        $this->create_invoice_service = $create_invoice_service;
    }

    /**
     * @param integer $id
     * @param array $data
     * @return boolean
     */
    public function execute(int $id, array $data): bool
    {
        if (isset($data['products']) && count($data['products']) > 0) {
            /**
             * Find the relation register and deleted it before update
             */
            $client_product = $this->client_product_repository->getByClientId($id);

            foreach ($client_product as $cl) {
                $this->client_product_repository->delete($cl->id);
            }
            
            foreach ($data['products'] as $product) {
                $this->create_client_product_service->execute($product, $id);
            }
        }
        
        if (isset($data['invoice_total'])) {
            $this->create_invoice_service->execute($id, $data['invoice_total']);
        }

        return $this->client_repository->update($id, [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone']
        ]);
    }
}
