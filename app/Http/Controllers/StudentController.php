<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get students
        $students = Student::latest()->paginate(5);

        //render view with students
        return view('students.index', compact('students'));
    }
    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'name'          => 'required|min:5',
            'address'       => 'required|min:5',
            'birth'         => 'required|min:5',
            'motivation'    => 'required|min:6'
        ]);


        //create student
        Student::create([
            'name'           => $request->name,
            'address'        => $request->address,
            'birth'          => $request->birth,
            'motivation'     => $request->motivation
        ]);

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    //
    public function edit(student $student)
    {
        return view('students.edit', compact('student'));
    }
    public function update(Request $request, student $student)
    {
        //validate form
        $request->validate([
            'name'          => 'required|min:5',
            'address'       => 'required|min:5',
            'birth'         => 'required|min:5',
            'motivation'    => 'required|min:6'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/students', $image->hashName());

            //delete old image
            Storage::delete('public/students/'.$student->image);

            //update student with new image
            $student->update([
                'name'     => $request->title,
                'address'     => $request->title,
                'birth'     => $request->title,
                'motivation'   => $request->content
            ]);

        } else {

            //update student without image
            $student->update([
                'name'     => $request->name,
                'address'     => $request->address,
                'birth'     => $request->birth,
                'motivation'   => $request->motivation
            ]);
        }

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy(student $student)
    {
        //delete image
        // Storage::delete('public/students/'. $student->image);

        //delete student
        $student->delete();

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
