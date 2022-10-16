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
    <div class="tab-content" id="conteudoMinhaAba">
        <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register-tab">
            <div class="card-body">
                <h5 class="card-title">Atualizar Cliente</h5>
                <div class="row mt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" value="{{ $client->name }}" readonly class="form-control" id="name" placeholder="Nome" name="name">
                        </div>
                        <div class="col-md-3">
                            <input type="email" value="{{ $client->email }}" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-3">
                            <input type="text" value="{{ $client->phone }}" id="phone" id="phone" name="phone" class="form-control" placeholder="Telefone">
                        </div>
                    </div>
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
                <button type="submit" id="btn_submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>
@endsection