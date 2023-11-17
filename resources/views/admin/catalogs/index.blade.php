@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2>Catalogs List</h2>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    @can('catalog-create')
                        <a class="btn btn-success" href="{{ route('admin.catalogs.create') }}"> Create New Catalog</a>
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

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="215px">Action</th>
        </tr>
        @foreach ($catalogs as $catalog)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $catalog->name }}</td>
                <td>
                    <form action="{{ route('admin.catalogs.destroy', $catalog->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('admin.catalogs.show', $catalog->id) }}">Show</a>
                        @can('catalog-edit')
                            <a class="btn btn-primary" href="{{ route('admin.catalogs.edit', $catalog->id) }}">Edit</a>
                        @endcan
                        @can('catalog-delete')
                            @csrf
                            @method('DELETE')
                        @endcan
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $catalogs->links() !!}
@endsection
