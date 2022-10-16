<?php

namespace App\Services\Client;

use App\Repositories\Client\ClientRepository;

class UpdateClientService
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

    /**
     * @param integer $id
     * @param array $data
     * @return boolean
     */
    public function execute(int $id, array $data): bool
    {
        if (isset($data['products']) && count($data['products']) > 0) {
            // product_client
        } else if (isset($data['invoice_total'])) {
            // invoice logic
        }

        return $this->client_repository->update($id, [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone']
        ]);
    }
}