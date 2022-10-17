<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateClientRequest;
use App\Http\Resources\Client\ClientResource;
use App\Repositories\Product\ProductRepository;
use App\Services\Client\CreateClientService;
use App\Services\Client\DeleteClientService;
use App\Services\Client\ListClientService;
use App\Services\Client\SearchClientService;
use App\Services\Client\ShowClientService;
use App\Services\Client\UpdateClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * @var CreateClientService
     */
    protected CreateClientService $create_client_service;

    /**
     * @var ListClientService
     */
    protected ListClientService $list_client_service;

    /**
     * @var ShowClientService
     */
    protected ShowClientService $show_client_service;

    /**
     * @var UpdateClientService
     */
    protected UpdateClientService $update_client_service;

    /**
     * @var DeleteClientService
     */
    protected DeleteClientService $delete_client_service;

    /**
     * @var SearchClientService
     */
    protected SearchClientService $search_client_service;

    private ProductRepository $product_repository;

    /**
     * @param CreateClientService $create_client_service
     * @param ListClientService $list_client_service
     * @param ShowClientService $show_client_service
     * @param UpdateClientService $update_client_service
     * @param DeleteClientService $delete_client_service
     * @param SearchClientService $search_client_service
     * @param ProductRepository $product_repository
     */
    public function __construct(
        CreateClientService $create_client_service,
        ListClientService $list_client_service,
        ShowClientService $show_client_service,
        UpdateClientService $update_client_service,
        DeleteClientService $delete_client_service,
        SearchClientService $search_client_service,
        ProductRepository $product_repository
    )
    {
        $this->create_client_service = $create_client_service;
        $this->list_client_service = $list_client_service;
        $this->show_client_service = $show_client_service;
        $this->update_client_service = $update_client_service;
        $this->delete_client_service = $delete_client_service;
        $this->search_client_service = $search_client_service;
        $this->product_repository = $product_repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = $this->list_client_service->execute();
        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = $this->product_repository->getAll();
        return view('client.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateClientRequest $request)
    {
        $this->create_client_service->execute($request->all());

        return redirect()->route('client.index')->with('success', 'Cliente adicionado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = new ClientResource($this->show_client_service->execute($id));
        $products = $this->product_repository->getAll();
        $selected_products = $this->product_repository->getByClient($id);

        $products->filter(function ($product) use ($selected_products){
            $selected_products->filter(function ($item) use ($product) {
                if ($product->id === $item->id) $product->selected = 'selected';
            });
        });

        return view('client.show', compact('client', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = new ClientResource($this->show_client_service->execute($id));
        $products = $this->product_repository->getAll();
        $selected_products = $this->product_repository->getByClient($id);

        $products->filter(function ($product) use ($selected_products){
            $selected_products->filter(function ($item) use ($product) {
                if ($product->id === $item->id) $product->selected = 'selected';
            });
        });
        
        return view('client.edit', compact('client', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateClientRequest $request, $id)
    {
        $this->update_client_service->execute($id, $request->except(['_method', '_token']));
        return redirect()->route('client.index')->with('success', 'Cliente atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->delete_client_service->execute($id);
        return redirect()->route('client.index')->with('success', 'Cliente removido com sucesso');
    }

    public function search(Request $request)
    {
       $clients = $this->search_client_service->execute($request->name);
       return view('client.index', compact('clients'));
    }
}
