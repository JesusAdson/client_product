<?php

namespace App\Services\Client;

use App\Repositories\Client\ClientRepository;

class DeleteClientService
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
     * @return boolean|null
     */
    public function execute(int $id): ?bool
    {
        return $this->client_repository->delete($id);
    }
}