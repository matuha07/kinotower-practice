@extends('admin.layout.main')

@section('title', 'Details page film: '.$film->name)

@section('content')
    <div class="row">
        <div class="col">
            <div class="card" >
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{$film->link_img}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <h5 class="card-title">{{$film->name}}</h5>
                            <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$film->category}}</li>
                                <li class="list-group-item">{{$film->year_of_issue}}</li>
                                <li class="list-group-item">{{$film->duration}} min</li>
                                <li class="list-group-item">{{$film->age}}+</li>

                                <li class="list-group-item"><a href="{{$film->link_video}}">Video</a></li>
                                <li class="list-group-item"><a href="{{$film->link_kinopoisk}}">Kinopoisk</a></li>
                            </ul>
                            <p class="card-text"><small class="text-body-secondary">{{$film->updated_at}}</small></p>
                        </div>
                    </div>
                </div>
            </div>
                <table class="table mt-5">
                    <thead>
                    <th>id</th>
                    <th>user</th>
                    <th>rating</th>
                    <th>created at</th>
                    </thead>
                    @foreach($ratings as $rating)
                        <tbody>
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rating->user()->withTrashed()->first()->fio}}</td>
                            <td>{{ $rating->ball }}</td>
                            <td>{{ $rating->created_at }}</td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>


        </div>
    </div>
@endsection
