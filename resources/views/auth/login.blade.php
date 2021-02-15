@extends('layouts.app')

@section('title')
Login
@endsection

@section('content')
<div style="height:100vh; background-color: #F3EFEF;">
<section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-8 col-xl-6 mt-5">
          <form action="{{route('login')}}" method="post" style="background-color: #fff; padding:20px; border-radius:10px;">
              @csrf
              @if(session('status'))
              <div class="text-center text-danger">
              {{session('status')}}
              </div>
              @endif
        <div class="row align-items-center mt-4">
          <div class="col">
            <input type="email" class="form-control @error('email') border-danger @enderror" 
            name="email" id="email" placeholder="Email" value="{{old('email')}}" style="height: 9vh; border-radius:10px;  background-color: #F3EFEF;">
                @error('email')
                <div class="text-center mt-2 m-2" style="color: red;">
                        {{$message}}
                    </div>
                @enderror
          </div>
        </div>
        <div class="row align-items-center mt-4">
          <div class="col">
            <input type="password" class="form-control @error('password') border-danger @enderror" 
            name="password" id="password" placeholder="Password" style="height: 9vh; border-radius:10px;  background-color: #F3EFEF;">
            @error('password')
                    <div class="text-center mt-2 m-2" style="color: red;">
                        {{$message}}
                    </div>
                @enderror
          </div>
        </div>
        <div class="row align-items-center mt-4">
          <div class="col">
            <input type="checkbox" name="remember" id="remember" >
            <label for="remember">Remember me</label>
          </div>
        </div>
        <div class="row justify-content-center mt-4">
          <div class="col">
            <button class="form-control btn-primary" style="height: 7vh; ">Sign In</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</section>
</div>
@endsection