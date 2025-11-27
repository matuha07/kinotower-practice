@extends('admin.layout.main')

@section('title', isset($film) ? 'Edit film: '.$film->name : 'Add film')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ isset($film) ? route('films.update', $film->id) : route('films.store') }}" method="POST">
                @csrf
                @isset($film)
                    @method('PATCH')
                @endisset
                <div class="mt-2">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" name="name" id="name" type="text" value="{{ isset($film) ? old('name', $film->name) : old('name') }}">
                </div>
                <div class="mt-2">
                    <label for="country_id" class="">Country</label>
                    <select name="country_id" id="country_id" class="form-select">
                        @foreach($countries as $country)
                            <option @selected(isset($film) && $film->country_id === $country->id) value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="duration">Duration</label>
                    <input class="form-control" name="duration" id="duration" type="number" value="{{ isset($film) ? old('duration', $film->duration) : old('duration') }}">
                </div>
                <div class="mt-2">
                    <label class="form-label" for="year_of_issue">Year of issue</label>
                    <input class="form-control" name="year_of_issue" id="year_of_issue" type="number" value="{{ isset($film) ? old('year_of_issue', $film->year_of_issue) : old('year_of_issue') }}">
                </div>
                <div class="mt-2">
                    <label class="form-label" for="age">Age</label>
                    <input class="form-control" name="age" id="age" type="number" value="{{ isset($film) ? old('age', $film->age) : old('age') }}">
                </div>
                <div class="mt-2">
                    <label class="form-label" for="link_img">Image link</label>
                    <input class="form-control" name="link_img" id="link_img" type="text" value="{{ isset($film) ? old('link_img', $film->link_img) : old('link_img') }}">
                </div>
                <div class="mt-2">
                    <label class="form-label" for="link_kinopoisk">Kinopoisk link</label>
                    <input class="form-control" name="link_kinopoisk" id="link_kinopoisk" type="text" value="{{ isset($film) ? old('link_kinopoisk', $film->link_kinopoisk) : old('link_kinopoisk') }}">
                </div>
                <div class="mt-2">
                    <label class="form-label" for="link_video">Video link</label>
                    <input class="form-control" name="link_video" id="link_video" type="text" value="{{ isset($film) ? old('link_video', $film->link_video) : old('link_video') }}">
                </div>

                <div class="mt-4">
                    <button class="btn btn-outline-success" type="submit">save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
