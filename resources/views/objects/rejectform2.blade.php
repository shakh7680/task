@extends('layouts.app')

@section('title')
Reject Form2
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
<section style="height:100vh; background-color: #F3EFEF; ">
    <div class="container topmargin">
      <a href="{{route('object.dashboard')}}" class="card-category h5">Home</a>
      <a href="{{route('form2')}}" class="card-category h5">Back</a>
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-10">
          
        <div class="row align-items-center">
            <div class="col mt-0 p-2">
             <h1 style="color: rgb(12, 12, 12); font-size:4vw; text-align:center">Reject to Subject</h1> 
            </div>
          </div>
          
          @if(session('status'))
          <div class="alert alert-success" role="alert">
              {{Session::get('status')}}
          </div>
          @endif
            <form action="{{route('storeform2', $data->id)}}" method="post" style="background-color: #fff; padding:20px; border-radius:10px;" enctype="multipart/form-data">
                @csrf
                 
            <div class="col-12 col-md-12 col-lg-12 col-xl-12" >
              <textarea class="@error('comment') border-danger @enderror form-control m-2" name="comment" id="comment" value="{{old('comment')}}" style="height: 8rem" ></textarea>
              @error('comment')
                    <div class="text-center mt-2 m-2" style="color:red;">
                    {{$message}}
                    </div>
               @enderror
            </div>

          
          
          
          <div class="row justify-content-center mt-2">
            <div class="col">
              <button type="submit" class="form-control btn-primary" style="height: 7vh;" >Reject</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection

