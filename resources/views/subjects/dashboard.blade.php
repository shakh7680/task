@extends('layouts.app')

@section('title')
Subject Dashboard
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

<div class="container-fluid mt-5" style="font-family:'Nunito', sans-serif; font-weight:700;">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-8 col-xl-10">
      <ul style="list-style-type: none;">
        <li class="h5">
          <a href="{{route('sendpage')}}">Send Message</a>
        </li>
        <li  class="h5"> 
          <a href="{{route('sended', auth()->user()->id)}}">Sended Form1/Send Form2</a>
        </li>
        <li  class="h5"> 
          <a href="{{route('sendedform2', auth()->user()->id)}}">Sended Form2</a>
        </li>
        <li  class="h5">
          <a href="{{route('malumot')}}">Oxirgi 6 oy haqidagi ma'lumot</a>
        </li>
      </ul>
    </div>
  </div>
</div>
@endsection

