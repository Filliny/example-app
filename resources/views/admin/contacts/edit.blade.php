@extends('layouts.admin')

@section('content')
    <form action="{{route('contacts.update',['contact'=>1])}}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="phone">Company Telephone</label>
            <input name="phone" type="tel" id="phone" class="form-control @error('phone') is-invalid @enderror" value="@isset($contacts){{$contacts->phone}}@endisset">
            @error('phone')
            <div class="invalid-feedback is-invalid">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="address">Company Adress</label>
            <input name="address" type="text" id="address" class="form-control @error('address') is-invalid @enderror" value="@isset($contacts){{$contacts->address}}@endisset">
            @error('address')
            <div class="invalid-feedback is-invalid">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="category_id">Company Email</label>
            <input name="email" type="email" id="email" class="form-control @error('email') is-invalid @enderror" value="@isset($contacts){{$contacts->email}}@endisset">
            @error('email')
            <div class="invalid-feedback is-invalid">{{$message}}</div>
            @enderror
        </div>
        <button class="btn btn-primary mt-3">Save</button>
    </form>
@endsection
