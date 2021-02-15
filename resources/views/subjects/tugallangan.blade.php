@extends('layouts.app')

@section('title')
Tugallangan
@endsection

@section('content')
<section style="height:100vh; background-color: #F3EFEF; ">
    <div class="container topmargin">
      <a href="{{route('subject.dashboard')}}">Subjects Dashboard</a>
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-10">
          <div class="row align-items-center">
              <div class="col mt-0 p-2">
               <h1 style="color: #fff; font-size:4vw; text-align:center">Send to Object</h1> 
              </div>
            </div>
            @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{Session::get('status')}}
            </div>
            @endif
              <form action="{{route('storetugallangan')}}" method="post" style="background-color: #fff; padding:20px; border-radius:10px;" enctype="multipart/form-data">
                  @csrf
            

  

                  <div class="row align-items-center">
                    <div class="col mt-4">
                    <input type="file"  class="form-control @error('file1') border-danger @enderror" name="file1" id="file1" onchange="previewFile(this)">
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
  <div class="row align-items-center">
    <div class="col mt-4">
    <input type="file"  class="form-control @error('file3') border-danger @enderror" name="file3" id="file3" onchange="previewFile(this)">
            @error('file3')
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
        <label for="optic">Optic tola uznuligi kmda</label>
    <input type="text" name="optic" id="optic" class="form-control">  
          @error('aloqa')
               <div class="text-center mt-2 m-2" style="color:red;">
               {{$message}}
               </div>
           @enderror
        <div id="previewImg"  style="max-width:130px; margin-top:20px;">
        </div>
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
        <div id="previewImg"  style="max-width:130px; margin-top:20px;">
        </div>
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
        <div id="previewImg"  style="max-width:130px; margin-top:20px;">
        </div>
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

