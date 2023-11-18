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
        })
            ->latest()
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->appends(request()->query());

        $catalogs = Catalog::get();
        $catalog_name = ucfirst(strtolower($catalog_name));
        return view('products.view', compact('products', 'catalogs', 'catalog_name'))->with('i');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request  $request;
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        $cart = request()->cookie('cart');
        if ($cart == null) {
            return redirect()
                ->route('products.view')
                ->with('error', 'Cart was empty. Did not checkout');
        }

        $cart = json_decode($cart);

        foreach ($cart as $productId => $quantity) {

            $product = Product::where('id', $this->removePrefixProduct($productId))->first();
            $product->quantity =  $product->quantity - $quantity;
            $product->save();
        }

        $clearCartCookie = cookie('cart', null, 0);
        return redirect()
            ->route('products.view')
            ->with('success', 'Checkout was successful. Check Email')
            ->withCookie($clearCartCookie);
    }

    public function removePrefixProduct($productId)
    {
        $productId = str_replace('product_', '', $productId);
        return $productId;
    }
}
