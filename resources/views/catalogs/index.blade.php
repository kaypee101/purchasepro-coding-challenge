@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Catalogs List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('catalogs.create') }}"> Create New Catalog</a>
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
            <th width="280px">Action</th>
        </tr>
        @foreach ($catalogs as $catalog)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $catalog->name }}</td>
                <td>
                    <form action="{{ route('catalogs.destroy', $catalog->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('catalogs.show', $catalog->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('catalogs.edit', $catalog->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $catalogs->links() !!}
@endsection
