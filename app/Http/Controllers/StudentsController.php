<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentsController extends Controller
{
    public function AddStudent(){
    	return view('student.addstudent');
    }

    public function StoreStudent(Request $request){
		$validatedData = $request->validate([
        	'name' => 'required|max:25|min:4',
        	'email' => 'required|unique:students',
        	'phone' => 'required|unique:students|max:12|min:9',
    	]);

    	$student=new Student;
    	$student->name=$request->name;
    	$student->email=$request->email;
    	$student->phone=$request->phone;
    	$student->save();
    	$notification=array(
    			'massage'=>'Successfully Student Info Created',
    			'alert-type' =>'success'
    		);
    		return redirect()->back()->with($notification);
    }

    public function AllStudent(){
    	$students =Student::all();
    	return view('student.viewstudents',compact('students'));
    }

    public function ViewStudent($id){
    	$student =Student::findOrFail($id);
    	return view('student.viewstudent',compact('student'));
    }

    public function DeleteStudent($id){
    	$delete =DB::table('categories')->where('id',$id)->delete();
    	if ($delete) {
    		$notification=array(
    			'massage'=>'Successfully Category Deleted',
    			'alert-type' =>'success'
    		);
    		return redirect()->back()->with($notification);
    	}
    }
    public function EditStudent($id){
        $student =Student::findOrFail($id);
        return view('student.editstudent')->with('stud',$student);
    }

    public function UpdateStudent(Request $request,$id){
        $validatedData = $request->validate([
        	'name' => 'required|max:25|min:4',
        	'email' => 'required|',
        	'phone' => 'required|max:12|min:9',
    	]);

        $student =Student::findOrFail($id);
    	$student->name=$request->name;
    	$student->email=$request->email;
    	$student->phone=$request->phone;
    	$student->save();
    	$notification=array(
    			'massage'=>'Successfully Student Info Updated',
    			'alert-type' =>'success'
    		);
    		return redirect()->route('all.students')->with($notification);
    }
}
