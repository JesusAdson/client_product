@extends('layouts.base')
@section('title', 'Cadastrar Produto')
@section('content')
<div class="card w-100">
    <form method="POST" id="form_products" action="{{ route('product.store') }}">
        @csrf
        <div class="card-body">
            <h5 class="card-title">Adicionar Produto</h5>
            <div class="row mt-3">
                @include('product._partials.form')
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 m-2">
                <button type="submit" id="btn_submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </form>
</div>
@endsection

<script text="text/javascript">
</script>
