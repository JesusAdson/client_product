<div class="row generate_invoice_first m-1">
    <div class="col-md-3 m-2" id="btn_generate">
        <button type="button" class="btn btn-info" onclick="generateInvoice()">Gerar fatura</button>
    </div>
</div>
<div class="row">
    <div class="hide" id="info">
        <label class="m-2"><strong>Produtos</strong></label>
        <div class="row mt-2">
            <div class="col-md-4 m-2" id="info_products">
            </div>
        </div>
        <div class="row mt-2" id="total_invoice">
            <div class="col-md-3 m-2">
                <label><strong>Valor total</strong></label><br />
                <input type="text" class="form-control" name="invoice_total" id="invoice_total" readonly>
            </div>
        </div>
    </div>
</div>

@if(isset($invoices) && $invoices->count() > 0)
<div class="row m-1">
    <div class="col-md-8">
        <div class="card w-50">
            <div class="card-body">
                <div class="card-title">Faturas</div>
                <div class="row">
                    @foreach($invoices as $key => $invoice)
                    <div class="card" style="width: 35%">
                        <div class="card-body">
                            <h5 class="card-title">#{{ $key + 1 }}</h5>
                            <p class="card-text">{{ $invoice->value }}</p>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <button type="button" onclick="onDeleteInvoice({{$invoice->id}})" id="btn_submit_invoice_delete" class="btn btn-danger btn-sm mb-1"><i class="fas fa-trash"></i></button>  
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>    
@endif

<script type="text/javascript">
    const onDeleteInvoice = (id) => {
        let csrf = document.querySelector('meta[name="csrf-token"]').content;
        let client_id = "{{$client->id ?? ''}}";

        $.ajax({
            type: "DELETE",
            url: `/invoice/${id}`,
            data: {
                _token: csrf
            },
            success: () => {
                window.location = `/client/edit/${client_id}`
            }
        });
    }
</script>

<style>
    .hide {
        display: none;
    }
    .show {
        display: block;
    }
</style>