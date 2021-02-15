@extends('layouts.app')

@section('title')
Object Dashboard
@endsection

@section('nav')
<ul class="navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="{{route('object.dashboard')}}">Home</a>
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

    <div class="container-fluid mt-5" style="font-family:'Nunito', sans-serif; font-weight:700;">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-10">
          <ul style="list-style-type: none;">
            <li class="h2">
              <a href="{{route('form1')}}">Form 1</a>
            </li>
            <li class="h2">
              <a href="{{route('form2')}}">Form 2</a>
            </li>
            <li class="h2">
              <a href="{{route('malumotyarim')}}">Oxirgi 6oy xisoboti</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

@endsection

