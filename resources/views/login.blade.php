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
                            <h3 class="fw-bold">Login</h3>
                            <small class="text-muted">Enter your credentials</small>
                        </div>
                        
                        <div class="">
                        
                            <form action="{{ route('login.auth') }}" method="POST">
                                @csrf
                                <div class="mt-4">
                                    @error('email')
                                    <div class="bg-danger text-white p-1 text-center">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Password</label>
                                        <input type="text" name="password" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection