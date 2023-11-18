@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2>Products List</h2>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <select id="filter-by-catalog" class="form-select form-select-lg mb-3" aria-label="Filter By Catalog">
                        <option value="">-Filter By Catalog-</option>
                        @foreach ($catalogs as $catalog_item)
                            <option value="{{ $catalog_item->name }}"
                                {{ $catalog_name == $catalog_item->name ? 'selected' : '' }}>
                                {{ $catalog_item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end col-xs-3 col-sm-3 col-md-3">
                    @can('product-checkout')
                        <form action="{{ route('products.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Checkout</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Catalog</th>
            <th>Details</th>
            <th>Available Quantity</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->catalog()->name }}</td>
                <td>{{ $product->detail }}</td>
                <td id="qty_{{ $product->id }}">{{ $product->quantity }}</td>
                <td class="d-flex justify-content-between align-items-center">
                    <button type="button" id="sub_{{ $product->id }}"
                        class="btn btn-secondary  sub-to-cart-button">「-」</button>
                    <input type="number" name="" id="product_{{ $product->id }}" value="0"
                        class="form-control mx-1 add-to-cart-input" readonly disabled>
                    <button type="button" id="add_{{ $product->id }}"
                        class="btn btn-secondary  add-to-cart-button">「∔」</button>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}
    @push('scripts')
        @vite('resources/js/Components/filter-by-category.js')
        @vite('resources/js/Components/cookie-methods.js')
        @vite('resources/js/Components/load-cart.js')
        @vite('resources/js/Components/add-to-cart.js')
    @endpush
@endsection
