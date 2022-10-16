<?php

namespace App\Services\Client;

use App\Repositories\Client\ClientRepository;

class CreateClientService
{
    /**
     * @var ClientRepository
     */
    private ClientRepository $client_repository;

    /**
     * @param ClientRepository $client_repository
     */
    public function __construct(ClientRepository $client_repository)
    {
        $this->client_repository = $client_repository;
    }

    public function execute(array $data)
    {
        if (isset($data['products']) && count($data['products']) > 0) {
            // product_client
        } else if (isset($data['invoice_total'])) {
            // invoice logic
        }

        return $this->client_repository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone']
        ]);
    }
}