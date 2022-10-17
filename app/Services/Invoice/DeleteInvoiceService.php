<?php

namespace App\Services\Invoice;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Invoice\InvoiceRepository;

class DeleteInvoiceService
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
     * @return bool|null
     */
    public function execute(int $id): ?bool
    {
        return $this->invoice_repository->delete($id);
    }
}