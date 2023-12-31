@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2>Products List</h2>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    @can('product-create')
                        <a class="btn btn-success" href="{{ route('admin.products.create') }}"> Create New Product</a>
                    @endcan
                </div>

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
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Catalog</th>
            <th>Details</th>
            <th>Quantity</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->catalog()->name }}</td>
                <td>{{ $product->detail }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('admin.products.show', $product->id) }}">Show</a>
                        @can('product-edit')
                            <a class="btn btn-primary" href="{{ route('admin.products.edit', $product->id) }}">Edit</a>
                        @endcan
                        @can('product-delete')
                            @csrf
                            @method('DELETE')
                        @endcan
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}
    @push('scripts')
        @vite('resources/js/Components/filter-by-category.js')
    @endpush
@endsection
