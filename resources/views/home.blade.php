@extends('layouts.app')

@section('content')
    <div class="container">
    @foreach($articles as $article)


            <div class="card flex-row align-items-center mt-5">
                <img src="{{Storage::url($article->image)}}" class="rounded m-3 " alt="..." style="height: 100px; width: 100px; object-fit: cover">
                <div class="card-body">

                    <h3 class="card-title">{{$article->name}}</h3>
                    <p class="card-text">{{$article->shortContent}}</p>
                    <a href="/article/{{$article->slug}}" class="btn btn-primary">Read more...</a>
                </div>
                <div class="date align-self-start">
                    <h6 class="m-4">{{date('d.m.Y H:m', strtotime($article->created_at))}}</h6>
                </div>

            </div>


    @endforeach
        </div>
@endsection
