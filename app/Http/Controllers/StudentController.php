<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StudentFormRequest;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id','DESC')->paginate(2);
        return view('index', compact('students'));
    }

    public function add()
    {
        return view('add');
    }

    public function store(StudentFormRequest $request)
    {
        $student = new Student;
        $validatedData = $request->validated();

        $student->name = $validatedData['name'];
        $student->email = $validatedData['email'];
        $student->age = $validatedData['age'];
        $student->gender = $validatedData['gender'];

        $uploadPath = "uploads/";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move($uploadPath,$filename);
            $student->image = $uploadPath.$filename;
        }

        $student->save();

        return back()->with('message', 'Student Added Successfully');
    }

    public function view(Student $student)
    {
        return view('view', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    public function update(StudentFormRequest $request, $student)
    {
        $student = Student::findOrFail($student);

        $validatedData = $request->validated();

        $student->name = $validatedData['name'];
        $student->email = $validatedData['email'];
        $student->age = $validatedData['age'];
        $student->gender = $validatedData['gender'];

        if($request->hasFile('image')) {

            if(File::exists($student->image)) {
                File::delete($student->image);
            }

            $uploadPath = "uploads/";
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move($uploadPath,$filename);
            $student->image = $uploadPath.$filename;
        }

        $student->update();

        return back()->with('message', 'Student Updated Successfully');
    }

    public function destroy($student)
    {
        $student = Student::findOrFail($student);
        
        if(File::exists($student->image)) {
            File::delete($student->image);
        }

        $student->delete();
        return back()->with('message', 'Student Deleted Successfully');
    }
}
