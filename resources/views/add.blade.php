@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="col-md-10 mx-auto mt-5">
          <x-message />
            <div class="card border-0 shadow">
                <div class="card-header border-0 bg-white">
                    <h4 class="fw-bold">
                        Add Student
                        <a href="{{ route('home') }}" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Age</label>
                        <input type="number" name="age" class="form-control">
                        @error('age')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Gender</label>
                        <select name="gender" id="" class="form-select">
                          <option value="">-- Select Gender --</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                        @error('gender')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                      </div>

                      <button type="submit" class="btn btn-primary w-100">Add Student</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection