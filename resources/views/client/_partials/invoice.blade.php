<div class="row generate_invoice_first">
    <div class="col-md-3 m-2">
        <button type="button" class="btn btn-info" onclick="generateInvoice()">Gerar fatura</button>
    </div>
</div>
<div class="hide" id="info">
    <label class="m-2"><strong>Produtos</strong></label>
    <div class="row mt-2">
        <div class="col-md-3 m-2" id="info_products">
        </div>
    </div>
    <div class="row mt-2" id="total_invoice">
        <div class="col-md-2 m-2">
            <label><strong>Valor total</strong></label><br/>
            <input type="text" class="form-control" name="invoice_total" id="invoice_total" readonly>
        </div>
    </div>
</div>

<style>
    .hide {
        display: none;
    }
    .show {
        display: block;
    }
</style>