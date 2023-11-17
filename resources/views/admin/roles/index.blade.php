@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2>Role Management</h2>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    @can('role-create')
                        <a class="btn btn-success" href="{{ route('admin.roles.create') }}"> Create New Role</a>
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
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('admin.roles.show', $role->id) }}">Show</a>
                        @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('admin.roles.edit', $role->id) }}">Edit</a>
                        @endcan
                        @can('role-delete')
                            @csrf
                            @method('DELETE')
                        @endcan
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


    {!! $roles->render() !!}
@endsection
