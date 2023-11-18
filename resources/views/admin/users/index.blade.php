@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2>Users Management</h2>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    @can('user-create')
                        <a class="btn btn-success" href="{{ route('admin.users.create') }}"> Create New User</a>
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
            <th>Email</th>
            <th>Roles</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $v)
                            <label class="badge bg-secondary">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('admin.users.show', $user->id) }}">Show</a>
                        @can('user-edit')
                            <a class="btn btn-primary" href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                        @endcan
                        @can('user-delete')
                            @csrf
                            @method('DELETE')
                        @endcan
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


    {!! $data->render() !!}
@endsection
