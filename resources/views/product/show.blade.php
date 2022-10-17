@extends('layouts.base')
@section('title', 'Atualizar Produto')
@section('content')
<div class="card w-100">
    <div class="card-body">
        <h5 class="card-title">Adicionar Produto</h5>
        <div class="row mt-3">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" value="{{ $product->name }}" class="form-control" id="name" placeholder="Nome" name="name" readonly>
                </div>
                <div class="col-md-3">
                    <input type="text" value="{{ $product->value }}" name="value" id="value" class="form-control" placeholder="Preço" readonly>
                </div>
                <div class="col-md-3">
                    <input type="text" value="{{ $product->description }}" id="description" id="description" name="description" class="form-control" placeholder="Descrição" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script text="text/javascript">
</script>
