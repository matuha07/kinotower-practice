@extends('admin.layout.main')
@section('title', 'Users page')
@section('content')
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>FIO</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
                </thead>
                @foreach($users as $user)
                    <tbody>
                    <tr @if($user->deleted_at) class="table-danger" @endif>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->fio }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <form action="@if($user->deleted_at){{ route('users.restore', $user->id) }} @else {{ route('users.destroy', $user->id) }} @endif" method="POST">
                                @csrf
                                @if($user->deleted_at)
                                    <button class="btn btn-outline-warning">Restore</button>
                                @else
                                    <button class="btn btn-outline-danger">Destroy</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
