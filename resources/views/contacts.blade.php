@extends('main')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif


    <form action="{{route('mailHandler')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Your Name</label>
            <input name="name" type="text" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
            @error('name')
                <div class="invalid-feedback is-invalid">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Your Email</label>
            <input name="email" type="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
            @error('email')
            <div class="invalid-feedback is-invalid">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="message">Your message</label>
            <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" >{{old('message')}}</textarea>
            @error('message')
            <div class="invalid-feedback is-invalid">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Send</button>

    </form>


@endsection

@section('title',$title)
