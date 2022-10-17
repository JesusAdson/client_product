@extends('layouts.base')
@section('title', 'Produtos')
@section('content')
@include('client._partials.alerts')
    <div class="card w-100">
        <div class="card-body">
            <h5 class="card-title">Produtos</h5>
            <form method="GET" action="{{ route('product.search') }}">
                <div class="row justify-content-between">
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="search">
                                    <button class="btn btn-success btn-sm">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </span>
                                <input type="text" class="form-control" name="name" placeholder="Nome" aria-label="Nome"aria-describedby="search">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a class="btn btn-dark" href="{{ route('product.create') }}"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="row justify-content-evenly">
                @foreach($products as $product )
                <x-card-data 
                    :title="$product->name"
                    :text="$product->value"
                    :show="route('product.show', ['id' => $product->id])"
                    :edit="route('product.edit', ['id' => $product->id])"
                    :delete="route('product.delete', ['id' => $product->id])"
                />
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->appends($_GET)->links('pagination::bootstrap-5')  }}
        </div>
    </div>
@endsection
