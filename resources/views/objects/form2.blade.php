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
<div class="container-fluid p-0">
  <div class="content">
    <div class="row">
     <div class="col">
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
                File 1
              </th>
              <th >
                File 2
              </th>
              <th>
                File 3
              </th>
              <th>
                Optic 
              </th>
              <th>
                Aloqa
              </th>
              <th>
                Obyekt
              </th>
              <th>
                Viloyat
              </th>
              <th>
                Status
              </th>
              <th>
                Delete
              </th>
            </thead>
            
            <tbody>
              @if ($datas->count())
              @foreach ($datas as $data)
              <tr>
                <td>
                {{$data->user->name}}
                </td>
                <td>
                {{$data->user->email}}
                </td>
                <td>
                  <a href="{{route('show', ['id'=> $data->id, 'file_id' => 1])}}">View</a>
                </td>
                <td>
                  <a href="{{route('show', ['id'=> $data->id, 'file_id' => 2])}}">View</a>
                </td>
                <td>
                  <a href="{{route('show', ['id'=> $data->id, 'file_id' => 3])}}">View</a>
                </td>
                <td>
                  {{$data->optic}}
                </td>
                <td>
                  {{$data->aloqa}}
                  
                </td>
                <td>
                  {{$data->obyekt}}
                </td>
                <td>
                  {{$data->viloyat}}
                </td>
                <td>
                  @if ($data->status)
                        <button class="btn btn-success" disabled>Approved</button>
                      @elseif($data->rejected)
                      <button class="btn btn-danger" disabled>Rejected</button>
                      @else  
                      <a href="{{route('rejectform2', $data->id)}}" class="btn btn-danger">
                          Reject
                        </a>
                        &nbsp;
                        <a href="{{ route('approveform2', ['id' => $data->id]) }}" class="btn btn-success">Approve</a>
                      @endif
                </td>
                <td>
                  <form action="{{route('deletesubject', $data->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>               
              </tr>           
            @endforeach 
              {{$datas->links()}}
              @endif
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
