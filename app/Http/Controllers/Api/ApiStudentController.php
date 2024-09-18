<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use Illuminate\Support\Facades\Storage;

class ApiStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return StudentResource::collection($students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = $request->all();

        if ($request->hasFile('image')) {
            $img = $request->file('image')->store('uploads/students','public');
        }else{
            $img = null;
        }

        $params['image'] = $img;

        Student::create($params);

        return response()->json([
            'data' => new StudentResource($params),
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::query()->findOrFail($id);

        return response()->json([
            'data' => new StudentResource($student),
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
 
         return response()->json([
            'data' => new StudentResource($params),
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::query()->findOrFail($id);
        $student->delete();
        return response()->json([
            'messages' => 'xóa thành công student có id ='.$id,
        ],201);
    }
}
