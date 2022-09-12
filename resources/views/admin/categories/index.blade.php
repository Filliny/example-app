@extends('layouts.admin')

@section('content')

    <a href="{{route('categories.create')}}" class="btn btn-primary">Create</a>



    @if($categories->count() === 0)
        <p>No categories</p>
    @endif

    @include('alerts')

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>name</th>

        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
                <a href="{{route('categories.edit',['category'=>$category->id])}}">{{$category->name}}</a>
                <span class="badge text-bg-secondary">{{$category->articles->count()}}</span>
            </td>
            <td>
                <form action="{{route('categories.destroy',['category'=>$category->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-primary mt-3">Delete</button>

                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
