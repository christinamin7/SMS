@extends('master')
@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-6">
            <div class="card mt-3">
               <div class="card-body">                
                <form action="{{ route('teacher.update',$teacher->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name"  value="{{ old('name',$teacher->name) }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>               
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email',$teacher->email) }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone',$teacher->phone) }}">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth',$teacher->date_of_birth) }}">
                        @error('date_of_birth')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="1" {{$teacher->gender==1 ? "checked":""}}>
                            <label class="form-check-label" for="male">
                             Male
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="0" {{$teacher->gender==0 ? "checked":""}}>
                            <label class="form-check-label" for="female">
                             female
                            </label>
                          </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label" >Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address"  value="{{ old('address',$teacher->address) }}">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="profile" class="form-label"　>Profile</label>
                        <img src="{{ asset('storage/teacher/'.$teacher->profile )}}" width="100px" height="100px"><br><br>
                        <input type="file" class="form-control" name="profile" id="profile" value="{{ $teacher->profile }}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
               </div>
 
            </div>
        </div>
    </div>
</div>

@endsection