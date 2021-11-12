<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function create(Request $request)
    {
        $validation=$request->validate([
            'name'=>'required',
            'age'=>'required',
            'country'=>'required'
        ]);

        $student=Student::create($validation);
        if($student){
            return response()->json(['success'=>'Student add successfully']);
        }else{
            return response()->json(['error'=>'Student Not add successfully']);

        }
    }

    public function get()
    {
        $students=Student::orderBy('id','DESC')->get();
        return response()->json($students);
    }

    public function edit($id)
    {
        $students=Student::findOrFail($id);
        return response()->json($students);
    }
    public function update(Request $request,$id)
    {
        $student=Student::findOrFail($id);
        $student->name=$request->name;
        $student->age=$request->age;
        $student->country=$request->country;
        $result=$student->save();
        if($result){
            return response()->json(['success'=>'Update Successfully']);
        }else{
            return response()->json(['error'=>'not update']);
        }
    }


    public function delete($id)
    {
        $students=Student::findOrFail($id);
        $result=$students->delete();
        if($result){
            return response()->json(['success'=>'Delete Successfully']);
        }else{
            return response()->json(['error'=>'not Delete']);
        }
    }

    public function search($search)
    {
        $searchTerm='%'.$search.'%';
        $students=Student::orderBy('id','DESC')->where('name','LIKE',$searchTerm)->get();
        return response()->json($students);
    }
}
