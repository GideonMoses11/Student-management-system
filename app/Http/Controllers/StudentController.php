<?php

namespace App\Http\Controllers;

use App\Student;
use App\Classes;
use App\Department;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    public function index(){
        $datas = Student::all();

        // foreach ($datas as $data) {
        //     dd($department);
        //     # code...
        // }
        return view('student.index', compact('datas'));
    }

    public function create(){
        $department = Department::all();
        $classes = Classes::all();
        return view('student.create', compact('department', 'classes'));
    }

    public function save(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'phone_number'=>'required',
            'email'=>'nullable',
            'roll'=>'nullable',
            'reg_id'=>'required',
            'department_id'=>'required',
            'classes_id'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'present_address'=>'required',
            'permanent_address'=>'required',
            'home_number'=>'required'
        ]);

        $stdImage = ' ';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() .'.'. $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/students/' . $filename));
            $stdImage = $filename;
            return $stdImage->response('png');
        }
        Student::create([
            'name'=>$request->name,
            'phone_number'=>$request->name,
            'email'=>$request->email,
            'roll'=>$request->roll,
            'reg_id'=>$request->reg_id,
            'department_id'=>$request->department_id,
            'classes_id'=>$request->classes_id,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'present_address'=>$request->present_address,
            'permanent_address'=>$request->permanent_address,
            'home_number'=>$request->home_number,
            'image'=>$stdImage,

        ]);
        return redirect()->back()->with('status', 'Student successfully saved!');
    }

    public function edit($id){
        $data = Student::find($id);
        $department = Department::all();
        $classes = Classes::all();
        // dd($id);
        return view('student.edit', compact('data', 'department', 'classes'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name'=>'required',
            'phone_number'=>'required',
            'email'=>'nullable',
            'roll'=>'nullable',
            'reg_id'=>'required',
            'department_id'=>'required',
            'classes_id'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'present_address'=>'required',
            'permanent_address'=>'required',
            'home_number'=>'required'
        ]);
        $datas = Student::find($id);
        $datas->update($request->all());
        $datas->save();

        // dd($request->all());
       return redirect('student.index')->with('status', 'Student successfully updated!');
    }

    public function delete($id){
        $datas = Student::find($id);
        // $datas->delete();
        dd($datas);

        return redirect('/student.index')->with('status', 'Student deleted successfully!');
    }
}
