@extends('admin.layout.main')
@section('title', 'Review page')
@section('content')
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Film</th>
                    <th>User</th>
                    <th>Created at</th>
                    <th>Date</th>
                    <th>Action</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $review->film()->withTrashed()->first()->name }}</td>

                        <td>{{ $review->user()->withTrashed()->first()->fio }}</td>
                        <td>{{ $review->message }}</td>
                        <td>{{ $review->created_at }}</td>
                        <td>
                            @if($review->is_approved)
                                <form action="{{ route('reviews.reject', $review->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-secondary">Reject</button>
                                </form>
                            @else
                                <form action="{{ route('reviews.approve', $review->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary">Approve</button>
                                </form>
                            @endif

                        </td>

                        <td>
                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-primary">destroy</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
