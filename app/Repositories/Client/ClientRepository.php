<?php

namespace App\Repositories\Client;

use App\Models\Client;
use App\Repositories\BaseRepository;

class ClientRepository extends BaseRepository
{
    /**
     * @param Client $model
     */
    public function __construct(Client $model)
    {
        parent::__construct($model);
    }
}