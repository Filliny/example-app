@extends('layouts.admin')


@section('content')
    <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.articles._form')
        <button class="btn btn-primary mt-3">Save</button>
    </form>

@endsection
