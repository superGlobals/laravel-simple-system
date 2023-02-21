@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="col-md-10 mx-auto mt-5">
            <x-message />
            <div class="card border-0 shadow">
                <div class="card-header border-0 bg-white">
                    <h4 class="fw-bold">
                        Student List
                        <a href="{{ route('student.logout') }}" class="btn btn-danger btn-sm">Logout</a>

                        <a href="{{ route('student.add') }}" class="btn btn-primary btn-sm float-end">Add Student</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Profile</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Age</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($students as $student)
                                  <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>
                                        <img src="{{ asset($student->image) }}" alt="" width="50" height="50">
                                    </td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->age }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('student.view', $student->id) }}" class="btn btn-warning">View</a>
                                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('student.delete', $student->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                          <div>
                            {{ $students->links() }}
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection