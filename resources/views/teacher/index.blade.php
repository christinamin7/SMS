@extends('master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
               <div class="card-body">
                <h5>Teacher List</h5>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date Of Birth</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                        <th scope="col">Profile</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($teachers as $teacher )
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $teacher->name; }}</td>
                        <td>{{ $teacher->email; }}</td>
                        <td>{{ $teacher->phone; }}</td>
                        <td>{{ $teacher->date_of_birth; }}</td>
                        <td>{{$teacher->gender=='1'?'Male':'Female'}}</td>
                        <td>{{ $teacher->address; }}</td>
                        <td><img src="{{ asset('storage/teacher/'.$teacher->profile )}}" width="50px" height="50px"></td>                       
                       @if (Auth::user()->role==2)
                       <td class="d-none"> 
                        @csrf
                        @method('put')
                        <a href="{{ route('teacher.edit',$teacher->id) }}"  class="btn btn-warning">E</a>
                      </td>
                      <td class="d-none"> 
                        <form action="{{ route('teacher.destroy',$teacher->id)}}" method="POST" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button  class="btn btn-danger">D</button>
                        </form>
                       </td>
                       @else
                       <td>                         
                        <form action="{{ route('teacher.edit',$teacher->id)}}" class="d-inline-block">
                          @csrf
                          @method('put')                         
                          <button  class="btn btn-warning">
                            <i class="fas fa-pen"></i>
                          </button>
                      </form>
                      </td>
                      
                      <td> 
                        <form action="{{ route('teacher.destroy',$teacher->id)}}" method="POST" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button  class="btn btn-danger"  {{Auth::id()==$teacher->id ? 'disabled' : '' }}>
                              <i class="fas fa-trash"></i>
                            </button>
                        </form>
                       </td>
                         
                       @endif

                        </tr>
                      @endforeach                   
                    </tbody>
                  </table>
                  @if (Auth::user()->role==2)                
                  <a href="{{ route('teacher.create') }}" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover d-none">Add Teacher</a> 
                  @else
                  <a href="{{ route('teacher.create') }}" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Add Teacher</a> 
                  @endif
                  
                 
            </div>
        </div>
    </div>
</div>

@endsection