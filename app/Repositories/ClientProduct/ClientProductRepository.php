<?php

namespace App\Repositories\ClientProduct;

use App\Models\ClientProduct;
use App\Repositories\BaseRepository;
use Illuminate\Support\Collection;

class ClientProductRepository extends BaseRepository
{
    /**
     * @param ClientProduct $model
     */
    public function __construct(ClientProduct $model)
    {
        parent::__construct($model);
    }

    public function getByClientId(int $client_id): ?Collection
    {
        return $this->model
            ->query()
            ->where('client_id', $client_id)
            ->get();
    }
}