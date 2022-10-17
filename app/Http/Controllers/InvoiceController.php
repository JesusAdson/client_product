<?php

namespace App\Http\Controllers;

use App\Services\Invoice\DeleteInvoiceService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * @var DeleteInvoiceService
     */
    protected DeleteInvoiceService $delete_invoice_service;

    /**
     * @param DeleteInvoiceService $delete_invoice_service
     */
    public function __construct(DeleteInvoiceService $delete_invoice_service)
    {
        $this->delete_invoice_service = $delete_invoice_service;
    }

    /**
     * @param integer $id
     */
    public function __invoke(int $id) {
        return $this->delete_invoice_service->execute($id);
    }
}
