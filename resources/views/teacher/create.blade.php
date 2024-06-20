@extends('master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-3">
               <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                </div>               
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email </label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Phone</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Phone">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Date of Birth">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                         Male
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                         female
                        </label>
                      </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Address">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Profile</label>
                    <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Profile">
                </div>
                <div class="mb-3">
                    <div class="btn btn-primary">Submit</div>
                </div>
 
            </div>
        </div>
    </div>
</div>
@endsection