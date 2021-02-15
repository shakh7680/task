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
            
            <form action="{{route('resendsave', $idsurov->id)}}" method="post" class="mb-5" style="background-color: rgb(255, 255, 255); padding:20px; border-radius:10px;" enctype="multipart/form-data">
              @csrf
              <div class="row align-items-center">
                <div class="col col-xl-6 mt-4 form-group">
                  <label for="num">Write Integer</label>
                  <input type="text" class="@error('num') is-invalid @enderror form-control" 
                  name="num" id="num" value="{{$idsurov->num}}" >  
                  @error('num')
                    <div class="text-center mt-2 m-2" style="color:red;">
                      {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
              
                <div class="row align-items-center">
              <div class="col-12 col-md-12 col-lg-4 col-xl-12">
                <textarea class="@error('comment') border-danger @enderror form-control"
                 name="comment" id="comment" class="col-12 m-2 ">{{$idsurov->comment}}</textarea>
                  @error('comment')
                    <div class="text-center mt-2 m-2" style="color:red;">
                    {{$message}}
                    </div>
                  @enderror
              </div>
                </div>
      
        
          <div class="row align-items-center">
          <div class="col mt-4">
          <input type="file"  class="form-control @error('file1') border-danger @enderror" name="file1" id="file1">
                  @error('file1')
                     <div class="text-center mt-2 m-2" style="color:red;">
                     {{$message}}
                     </div>
                 @enderror
              <div id="previewImg"  style="max-width:130px; margin-top:20px;">
              </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col mt-4">
          <input type="file"  class="form-control @error('file2') border-danger @enderror" name="file2" id="file2" onchange="previewFile(this)">
                  @error('file2')
                     <div class="text-center mt-2 m-2" style="color:red;">
                     {{$message}}
                     </div>
                 @enderror
              <div id="previewImg"  style="max-width:130px; margin-top:20px;">
              </div>
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

