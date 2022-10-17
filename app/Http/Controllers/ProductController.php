<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProduct;
use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Services\Product\ {
    CreateProductService,
    ListProductService,
    ShowProductService,
    UpdateProductService,
    DeleteProductService,
    SearchProductService
};

class ProductController extends Controller
{
    /**
     * @var CreateProductService
     */
    protected CreateProductService $create_product_service;

    /**
     * @var ListProductService
     */
    protected ListProductService $list_product_service;

    /**
     * @var ShowProductService
     */
    protected ShowProductService $show_product_service;

    /**
     * @var UpdateProductService
     */
    protected UpdateProductService $update_product_service;

    /**
     * @var DeleteProductService
     */
    protected DeleteProductService $delete_product_service;

    /**
     * @var SearchProductService
     */
    protected SearchProductService $search_product_service;

    /**
     * @param CreateProductService $create_product_service
     * @param ListProductService $list_product_service
     * @param ShowProductService $show_product_service
     * @param UpdateProductService $update_product_service
     * @param DeleteProductService $delete_product_service
     * @param SearchProductService $search_product_service
     */
    public function __construct(
        CreateProductService $create_product_service,
        ListProductService $list_product_service,
        ShowProductService $show_product_service,
        UpdateProductService $update_product_service,
        DeleteProductService $delete_product_service,
        SearchProductService $search_product_service
    )
    {
        $this->create_product_service = $create_product_service;
        $this->list_product_service = $list_product_service;
        $this->show_product_service = $show_product_service;
        $this->update_product_service = $update_product_service;
        $this->delete_product_service = $delete_product_service;
        $this->search_product_service = $search_product_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::query()->paginate(10);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUpdateProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        $this->create_product_service->execute($request->all());
        return redirect()->route('product.index')->with('sucess', 'Produto adicionado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->show_product_service->execute($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->show_product_service->execute($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreUpdateProductRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {
        $this->update_product_service->execute($id, $request->all());

        return redirect()->route('product.index')->with('success', 'Produto atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->delete_product_service->execute($id);

        return redirect()->route('product.index')->with('success', 'Producto deletado com sucesso');
    }

    public function search(Request $request)
    {
       $products = $this->search_product_service->execute($request->name);
       return view('product.index', compact('products'));
    }
}
