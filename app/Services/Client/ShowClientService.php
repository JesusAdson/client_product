<?php

namespace App\Services\Client;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Client\ClientRepository;

class ShowClientService
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
     * It returns all clients on the database
     *
     * @return ?Model
     */
    public function execute(int $id): ?Model
    {
       return $this->client_repository->getByIdWithRelationships($id);
    }
}