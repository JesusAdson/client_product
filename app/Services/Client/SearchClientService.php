<?php

namespace App\Services\Client;

use Illuminate\Support\Collection;
use App\Repositories\Client\ClientRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchClientService
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
     * @return LengthAwarePaginator
     */
    public function execute(string $name): LengthAwarePaginator
    {
       return $this->client_repository->getByName($name);
    }
}