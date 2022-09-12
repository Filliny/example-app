@extends('layouts.admin')


@section('content')

    <form action="{{route('articles.update',['article'=>$article->id])}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        @include('admin.articles._form')
        <button class="btn btn-primary mt-3">Save</button>
    </form>

@endsection
