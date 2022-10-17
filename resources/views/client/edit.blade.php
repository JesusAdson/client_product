@extends('layouts.base')
@section('title', 'Atualizar Cliente')
@section('content')
<div class="card w-100">
    <ul class="nav nav-tabs" id="minhaAba" role="tablist">
        <li class="nav-item" role="presentation">
            <button 
                class="nav-link active" 
                id="register-tab" 
                data-bs-toggle="tab" 
                data-bs-target="#register"
                type="button" 
                role="tab" 
                aria-controls="register" 
                aria-selected="true">
                Dados Pessoais
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button 
                class="nav-link" 
                id="product-tab" 
                data-bs-toggle="tab" 
                data-bs-target="#product" 
                type="button"
                role="tab" 
                aria-controls="product" 
                aria-selected="false">
                Produtos
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button 
                class="nav-link" 
                id="invoice-tab" 
                data-bs-toggle="tab" 
                data-bs-target="#invoice" 
                type="button"
                role="tab" 
                aria-controls="invoice" 
                aria-selected="false">
                Faturas
            </button>
        </li>
    </ul>
    <form method="POST" id="form_clients" action="{{ route('client.update', ['id' => $client->id]) }}">
        @method('PUT')
        @csrf
        <div class="tab-content" id="conteudoMinhaAba">
            <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register-tab">
                <div class="card-body">
                    <h5 class="card-title">Atualizar Cliente</h5>
                    <div class="row mt-3">
                        @include('client._partials.form', ['client' => $client])
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="product-tab">
                <div class="card-body">
                    <h5 class="card-title">Atualizar Produtos</h5>
                    <div class="row mt-3">
                        @include('client._partials.product_form')
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                @include('client._partials.invoice')
            </div>
            <div class="row">
                <div class="col-md-2 m-2">
                    <button type="button" onclick="submit()" id="btn_submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

<script text="text/javascript">

const submit = () => {
    document.getElementById('btn_submit').addEventListener('click', submitForm());
}

const calculateInvoice = products => {
    return products.reduce((sum, item) => {
        return sum + parseFloat(item.value);
    }, 0);

}

const submitForm = (e) => {
    let button = this;
    e.preventDefault();
    button.form.submit();
}

const generateInvoice = () => {
    let selected = [];
    for (let option of document.getElementById('products').options) {
        if(option.selected) selected.push(option.value);
    }
        
    let products = @json($products);
    let filtered_products = [];
    selected.map(item => {
        for(product in products) {
            if (products[product].id === parseInt(item)) filtered_products.push(products[product])
        }
    });

    let total_products = calculateInvoice(filtered_products);
    console.log(total_products);
        document.getElementById('info_products').innerHTML = '';

    if (filtered_products.length > 0) {
        filtered_products.forEach(item => {
            renderInvoiceData(item);
        })
     }

    document.getElementById('invoice_total').value = "R$ " + total_products
    document.getElementById('info').classList = 'show';
}

const renderInvoiceData = product => {
    let root_element = document.getElementById('info_products');
    
    /** div - row */
    let row_div = document.createElement('div');
    row_div.classList.add('row');   
    /** div - col - product name */
    let col_div_name = document.createElement('div');
    col_div_name.classList.add('col-md-4');
    col_div_name.innerHTML = product.name;  
    /** div - col - product value */
    let col_div_value = document.createElement('div');
    col_div_value.classList.add('col-md-3');
    col_div_value.innerHTML = product.value;    
    row_div.appendChild(col_div_name);
    row_div.appendChild(col_div_value);
    root_element.appendChild(row_div);
}

</script>
