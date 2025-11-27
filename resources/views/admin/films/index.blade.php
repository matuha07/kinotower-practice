@extends('admin.layout.main')

@section('title', 'Films list')

@section('content')

    <div class="row mb-3">
        <div class="col">
            <a class="btn btn-outline-success" href="{{ route('films.create') }}">Add films</a>
        </div>
    </div>

    <div class="row">
        @foreach($films as $film)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img
                        class="card-img-top"
                        src="{{ $film->link_img }}"
                        style="height: 450px; width: 100%;"
                    >
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{ $film->name }}</strong> </h5>
                        <p class="card-text mt-4">Age: {{ $film->age }}+</p>
                        <p class="card-text ">Year: {{ $film->year_of_issue }}</p>
                        <p class="card-text">
                            @foreach($film->categories as $category)
                                {{$category->name}}@unless($loop->last), @endunless
                            @endforeach
                        </p>
                    </div>
                    <div class="card-footer mt-auto d-flex justify-content-between">
                        <a class="btn btn-outline-warning" href="{{ route('films.edit', $film->id) }}">Edit</a>
                        <a class="btn btn-outline-info" href="{{ route('films.show', $film->id) }}">View</a>
                        <a class="btn btn-outline-info" href="{{ route('films.categories', $film->id) }}">Genre</a>

                        <form action="{{ route('films.destroy', $film->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger" onclick="return confirm('Delete film?')">Destroy</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
