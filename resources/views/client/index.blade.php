@extends('layouts.base')
@section('title', 'Clientes')
@section('content')
@include('client._partials.alerts')
    <div class="card w-100">
        <div class="card-body">
            <h5 class="card-title">Clientes</h5>
            <form method="GET" action="{{ route('client.search') }}">
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
                        <a class="btn btn-dark" href="{{ route('client.create') }}"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="row justify-content-evenly">
                @foreach($clients as $client )
                    @component('components.card_data')
                        @slot('title'){{ $client->name }}@endslot
                        @slot('email'){{ $client->email }}@endslot
                        @slot('show_route'){{ route('client.show', ['id' => $client->id]) }}@endslot
                        @slot('edit_route'){{ route('client.edit', ['id' => $client->id]) }}@endslot
                        @slot('delete_route'){{ route('client.delete', ['id' => $client->id]) }}@endslot
                    @endcomponent
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $clients->appends($_GET)->links('pagination::bootstrap-5')  }}
        </div>
    </div>
@endsection
