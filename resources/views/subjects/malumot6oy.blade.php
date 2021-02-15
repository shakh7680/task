@extends('layouts.app')

@section('title') 
Oxirgi 6 oy hisobat
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

<div class="container-fluid p-0" style="position: relative;">
  <section class="pb-5" style=" background-color: #F3EFEF; ">
    <div class="container">
      <div class="row justify-content-center ">
        <div class="col-12 col-md-8 col-lg-8 col-xl-10 mt-5">      
          <div class="row align-items-center mt-3">
            {{-- Viloyat tanlang --}}
            <div class="col-12 col-sm-12 col-lg-4 col-xl-4" >
                <select name="region" id="region" class="col-12 m-2 " style="height: 3rem; border-radius:5px; background-color:#F3EFEF;">
                    <option value="" id="">Select region</option>
                </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>   
  @endsection
  