<?php

namespace App\Repositories\Invoice;

use App\Models\Invoice;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class InvoiceRepository extends BaseRepository
{
    /**
     * @param Invoice $model
     */
    public function __construct(Invoice $model)
    {
        parent::__construct($model);
    }

    public function getAllByClientId(int $id): Collection
    {
        return $this->model
            ->query()
            ->where('client_id', $id)
            ->orderBy('value', 'asc')
            ->get();
    }
}