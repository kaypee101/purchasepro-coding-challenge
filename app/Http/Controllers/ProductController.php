<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:product-view', ['only' => ['view']]);
        $this->middleware('permission:product-checkout', ['only' => ['checkout']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $page = request()->input('page', 1);
        $catalog_name = request()->input('catalog');

        $catalog = Catalog::where('name', $catalog_name)->first();
        $products = Product::when($catalog, function ($query, $catalog) {
            $query->where('catalog_id', $catalog->id);
        })->latest()->paginate(5)
            ->appends(request()->query());

        $catalogs = Catalog::get();
        $catalog_name = ucfirst(strtolower($catalog_name));
        return view('products.view', compact('products', 'catalogs', 'catalog_name'))->with('i');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $products = Product::latest()->paginate(5);
        return view('products.checkout', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
