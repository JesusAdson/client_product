<?php

namespace App\Services\Invoice;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Invoice\InvoiceRepository;

class CreateInvoiceService
{
    /**
     * @var InvoiceRepository
     */
    private InvoiceRepository $invoice_repository;

    /**
     * @param InvoiceRepository $invoice_repository
     */
    public function __construct(InvoiceRepository $invoice_repository)
    {
       $this->invoice_repository = $invoice_repository; 
    }

    /**
     * @param integer $client_id
     * @param [type] $value
     * @return Model|null
     */
    public function execute(int $client_id, $value): ?Model
    {
        return $this->invoice_repository->create([
            'client_id' => $client_id,
            'value' => $value
        ]);
    }
}