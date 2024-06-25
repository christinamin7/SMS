@extends('master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
               <div class="card-body">
                <h5>Admin List</h5>
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
                      @foreach ($admins as $admin )
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $admin->name; }}</td>
                        <td>{{ $admin->email; }}</td>
                        <td>{{ $admin->phone; }}</td>
                        <td>{{ $admin->date_of_birth; }}</td>
                        <td>{{$admin->gender=='1'?'Male':'Female'}}</td>
                        <td>{{ $admin->address; }}</td>
                        <td ><img src="{{ asset('storage/admin/'.$admin->profile )}}" width="50px" height="50px"></td>                       
                        <td> 
                            @csrf
                            @method('put')
                            <a href="{{ route('admin.edit',$admin->id) }}"  class="btn btn-warning">E</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.destroy',$admin->id)}}" method="POST" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button  class="btn btn-danger">D</button>
                            </form>
                        </td>
                        </tr>
                      @endforeach                   
                    </tbody>
                  </table>
                  <a href="{{ route('admin.create') }}" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Add admin</a> 
            </div>
        </div>
    </div>
</div>

@endsection