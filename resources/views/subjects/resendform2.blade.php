@extends('layouts.app')

@section('title')
Resended
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
<section style="height:100vh; background-color: #F3EFEF; ">
    <div class="container topmargin">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-10">
          @if(session('status'))
          <div class="alert alert-success" role="alert">
            {{Session::get('status')}}
          </div>
        @endif
            <div class="text-center pt-3">
            <div class="h4">
            Resended your message
            </div>
            <div class="alert alert-warning" role="alert">
              @foreach ($datas as $item)
                {{$item->comment}}
                {{$item->id}}
            @endforeach
            </div>

            </div>
            
            <form action="{{route('resendform2save', $idsurov->id)}}" method="post" class="mb-5" style="background-color: rgb(255, 255, 255); padding:20px; border-radius:10px;" enctype="multipart/form-data">
                @csrf
            

  

                <div class="row align-items-center">
                  <div class="col mt-4">
                  <input type="file"  class="form-control @error('file1') border-danger @enderror" name="file1" id="file1">
                          @error('file1')
                             <div class="text-center mt-2 m-2" style="color:red;">
                             {{$message}}
                             </div>
                         @enderror
                  </div>
                </div>
  <div class="row align-items-center">
  <div class="col mt-4">
  <input type="file"  class="form-control @error('file2') border-danger @enderror" name="file2" id="file2">
          @error('file2')
             <div class="text-center mt-2 m-2" style="color:red;">
             {{$message}}
             </div>
         @enderror
  </div>
</div>
<div class="row align-items-center">
  <div class="col mt-4">
  <input type="file"  class="form-control @error('file3') border-danger @enderror" name="file3" id="file3" >
          @error('file3')
             <div class="text-center mt-2 m-2" style="color:red;">
             {{$message}}
             </div>
         @enderror
  </div>
</div>
<div class="row align-items-center">
  <div class="col mt-4">
      <label for="optic">Optic tola uznuligi kmda</label>
  <input type="text" name="optic" id="optic" class="form-control">  
        @error('aloqa')
             <div class="text-center mt-2 m-2" style="color:red;">
             {{$message}}
             </div>
         @enderror
  </div>


  <div class="col mt-4">
      <label for="aloqa">Aloqa turini tanlang</label>
  <select name="aloqa" id="aloqa"  class="form-control">
      <option value="">Select mobile line</option>
      <option value="2g">2g</option>
      <option value="3g">3g</option>
      <option value="4g">4g</option>
  </select>
          @error('aloqa')
             <div class="text-center mt-2 m-2" style="color:red;">
             {{$message}}
             </div>
         @enderror
  </div>



  <div class="col mt-4">
      <label for="obyekt">Obyekt turini aniqlang</label>
  <select name="obyekt" id="obyekt" class="form-control">
      <option value="">Obyekt turini tanlang</option>
      <option value="switch">Switch</option>
      <option value="hub">Hub</option>
      <option value="msan">MSAN</option>
      <option value="ats">ATS</option>
  </select>
          @error('aloqa')
             <div class="text-center mt-2 m-2" style="color:red;">
             {{$message}}
             </div>
         @enderror
  </div>
  <div class="col mt-4">
      <label for="viloyat">Viloyatni belgilang</label>
  <select name="viloyat" id="viloyat" class="form-control">
      <option value="Toshkent">Tashkent</option>
      <option value="Jizzakh">Jizzakh</option>
      <option value="Farg'ona">Farg'ona</option>
      <option value="Samarkand">Samarkand</option>
      <option value="Xorazm">Xorazm</option>
  </select>
          @error('viloya')
             <div class="text-center mt-2 m-2" style="color:red;">
             {{$message}}
             </div>
         @enderror
  </div>
</div>


<div class="row justify-content-center mt-2">
  <div class="col">
    <button type="submit" class="form-control btn-primary" style="height: 7vh;" >Sent</button>
  </div>
</div>
        </form>
       
        </div>
      </div>
    </div>
  </section>
@endsection
