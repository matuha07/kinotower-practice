@extends('admin.layout.main')

@section('title', 'Film genres: '.$film->name)

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{route('films.categories.save', $film->id)}}" method="post">
                @csrf
                <ul class="list-group">
                    @foreach($categories as $category)
                        <li class="list-group-item">
                            <input type="checkbox"
                                   name="categories[]" id="id-{{$category->id}}" value="{{$category->id}}"
                                   class="form-check-input me-2"
                                   @checked($film->categories->contains($category->id))
                            >
                            <label for="id-{{$category->id}}"
                                                           class="form-check-label">{{$category->name}}</label>

                        </li>
                    @endforeach
                </ul>
                <div class="m-2">
                    <button class="btn btn-outline-success" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection
