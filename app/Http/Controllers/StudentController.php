<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Room;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
       $stuendt = tcodetreen web;
        giữ cái nào;
        return view('student.danhsach',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listRoom = Room::all();
        return view('student.them',compact('listRoom'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $params = $request->all();

        if ($request->hasFile('image')) {
            $img = $request->file('image')->store('uploads/students','public');
        }else{
            $img = null;
        }

        $params['image'] = $img;

        Student::create($params);

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::query()->findOrFail($id);

        return view('student.sua',compact('student'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, string $id)
    {
        $params = $request->all();
       $student = Student::query()->findOrFail($id);
        if ($request->hasFile('image')) {
            if($student->image){
             Storage::disk('public')->delete($student->image);
            }
            $img = $request->file('image')->store('uploads/students','public');
        }else{
            $img = $student->image;
        }

        $params['image'] = $img;

        $student->update($params);

        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::query()->findOrFail($id);
          $student->delete();
        return redirect()->route('student.index');
    }
}
