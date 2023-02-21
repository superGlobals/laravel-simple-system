@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="col-md-5 mx-auto mt-5">
            <div class="card border-0 shadow">
                {{-- <div class="card-header border-0 bg-white">
                    <h4 class="fw-bold">
                        <a href="{{ route('home') }}" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="text-center">
                            <img src="{{ asset($student->image) }}" class="rounded-circle" alt="" width="120" height="120">
                        </div>
                        <div class="text-muted mt-3">
                            <h4>Name: {{ $student->name }}</h4>
                            <h4>Age: {{ $student->age }}</h4>
                            <h4>Gender: {{ $student->gender }}</h4>
                            <h4>Email: {{ $student->email }}</h4>
                        </div>
                        <a href="{{ route('home') }}" class="btn btn-dark btn-sm w-100 mt-3">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection