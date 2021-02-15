
@extends('layouts.app')

@section('title')
Subject Sended 
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
<div class="content">
        <div class="row">
         
          <div class="col-md-12">
            <div class="card">
              
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Name
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Number
                      </th>
                      <th>
                        Comment
                      </th>
                      <th>
                        File 1
                      </th>
                      <th >
                        File 2
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Second Form
                      </th>
                      <th>
                        Download
                      </th>
                      <th>
                        Delete
                      </th>
                      
                    </thead>

                    <tbody>
                      @foreach ($datas as $data)
                        <tr>
                          <td>
                          {{auth()->user()->name}}
                          </td>
                          <td>
                          {{auth()->user()->email}}
                          </td>
                          <td>
                            {{ $data->num }}
                          </td>
                          <td>
                            {{ $data->comment }}
                          </td>
                          <td>
                            <a href="{{route('showfile',['id'=>$data->id,'file_id'=>1])}}">View</a>
                          </td>
                          <td>
                            <a href="{{route('showfile', ['id'=>$data->id, 'file_id'=>2])}}">View</a>
                          </td>
                          <td>
                            @if ($data->status)
                              <button class="btn btn-success" disabled>Approved</button>
                            @elseif($data->rejected)
                              <a href="{{route('resend', $data->id)}}" class="btn btn-danger">
                                Resend
                              </a>
                            @else
                              {{-- &nbsp; --}}
                              <a href="#" class="btn btn-success" disabled>Checking</a>
                            @endif
                          </td>
                          <td>
                            @if ($data->status)
                            <a href="{{route('tugallangan')}}"><button class="btn btn-success" >Send</button></a>
                             
                             @else
                             <button class="btn btn-success" disabled>Send</button>
                             @endif
                          </td>
                          <td>
                            <a href="{{route('downloaded', $data->file1)}}">Download1</a>
                            <a href="{{route('downloaded', $data->file2)}}">Download2</a>
                          </td>
                          <td>
                            <form action="{{route('deletesubjects', $data->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                          </td>
                         
                        </tr>
                        
                      
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
