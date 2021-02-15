@extends('layouts.app')

@section('title')
View document
@endsection
@section('content')
    <div class="container">
        <a href="{{route('object.dashboard')}}" class="card-category h5">Home</a>
        <a href="{{route('form1')}}" class="card-category h5">Back</a>
        <div class="text-center">
            <p class="mt-5">
               
                <iframe src="{{ asset('storage/files/'.$file_name)}}" frameborder="0" style="width:100%; height:100vh;"></iframe>
                
            </p>
        </div>
    </div>
@endsection