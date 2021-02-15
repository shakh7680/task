@extends('layouts.app')

@section('title')
View document
@endsection

@section('nav')
<ul class="navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="{{route('subject.dashboard')}}">Home</a>
  </li>
  <li class="nav-item ">
    <form action="{{route('logout')}}" method="post">
      @csrf
      <button type="submit" class="nav-link btn btn-outline-danger">Logout</button>
    </form>
  </li>
</ul>
@endsection
@section('content')
    <div class="container">
        <div class="text-center">
            <p class="mt-5">
               
                <iframe src="{{ asset('storage/files/'.$file_name)}}" frameborder="0" style="width:100%; height:100vh;"></iframe>
                
            </p>
        </div>
    </div>
@endsection