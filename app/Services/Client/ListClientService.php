<?php

namespace App\Services\Client;

use App\Repositories\Client\ClientRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListClientService
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
     * @return LegthAwarePaginator
     */
    public function execute(): LengthAwarePaginator
    {
       return $this->client_repository->listAllPaginated();
    }
}