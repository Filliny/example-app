@extends('layouts.admin')


@section('content')
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input name="name" type="text" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
            @error('name')
            <div class="invalid-feedback is-invalid">{{$message}}</div>
            @enderror
        </div>
        <button class="btn btn-primary mt-3">Save</button>
    </form>

@endsection
