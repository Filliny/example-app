@extends('layouts.admin')

@section('content')

    <a href="{{route('articles.create')}}" class="btn btn-primary">Create</a>



    @if($articles->count() === 0)
        <p>No articles</p>
    @endif

    @include('alerts')

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>img</th>
            <th>name</th>
            <th>content</th>
            <th>category</th>
            <th>create date</th>

        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{$loop->iteration+($articles->currentPage()-1)* $articles->perPage() }}</td>
                <td>
                    <img src="{{Storage::url($article->image)}}" alt="" style="width: 120px; height: 80px;">
                </td>
                <td>
                    <a href="{{route('articles.edit',['article'=>$article->id])}}">{{$article->name}}</a>
                </td>
                <td>{!! $article->content !!}</td>
                <td>{{$article->category->name}}</td>
                <td>{{date('d.m.Y', strtotime($article->created_at))}}</td>
                <td>
                    <form action="{{route('articles.destroy',['article'=>$article->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete</button>

                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$articles->links('vendor.pagination.bootstrap-5')}}
@endsection
