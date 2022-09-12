@extends('layouts.admin')


@section('content')
    <h1>Edit category {{$category->name}}</h1>

    <form action="{{route('categories.update',['category'=>$category->id])}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input name="name" type="text" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ?? $category->name}}">
            @error('name')
            <div class="invalid-feedback is-invalid">{{$message}}</div>
            @enderror
        </div>
        <button class="btn btn-primary mt-3">Save</button>
    </form>

    <h3 class="mt-3">Articles in category:</h3>
    <div class="mt-3">
        <table>
            @foreach($articles as $article)
                <tr>
                    <td>
                        <a href="{{route('articles.edit',['article'=>$article->id])}}">{{$article->name}}</a>
                    </td>
                </tr>
            @endforeach
          </table>
    </div>

@endsection
