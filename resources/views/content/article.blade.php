@extends('layouts.app')
@section('content')

    <div class="card flex-row align-items-center mt-5">
        <img src="{{Storage::url($article->image)}}" class="rounded m-3 align-self-start" alt="..." style="height: 100px; width: 100px; object-fit: cover">
        <div class="card-body">

            <h3 class="card-title">{{$article->name}}</h3>
            <p class="card-text">{!! $article->content !!}</p>

        </div>
        <div class="date align-self-start">
            <h6 class="m-4">{{date('d.m.Y H:m', strtotime($article->created_at))}}</h6>
        </div>



    </div>
        <h2 class="pt-3 ">Comments</h2>
        <div class="card flex-column">
            <div class="card flex-row align-content-stretch  mt-1">
                @if(Auth::user())
                    <form action="{{route('postcomment',$article->slug)}}" method="POST">
                        @csrf
                        <div class="form-group mt-3 w-100">
                            <label for="comment">Comment text</label>
                            <textarea name="comment" id="comment" class="form-control w-100 @error('comment') is-invalid @enderror"></textarea>
                            @error('comment')
                            <div class="invalid-feedback is-invalid">{{$message}}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary mt-3 align-self-end">Post comment</button>
                    </form>
                @else
                    <h5 class="text-danger m-2">Only authorized users can leave comments - please login or register</h5>
                @endif
        </div>

        @foreach($comments as $comment)
                <div class="card flex-column align-content-stretch  m-2">
                    <h1>{{$comment->user->name}}</h1>
                    <h3>{{$comment->comment_text}}</h3>
                </div>
        @endforeach

    </div>


@endsection
