<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $department = Department::all();
        return view('index', compact('department'));
    }

    public function create(){
        return view('create');
    }

    public function save(Request $request){
        $this->validate($request, [
            'title'=>'required'
        ]);
        Department::create([
            'title'=>$request->title
        ]);
        return redirect()->back()->with('status', 'Department successfully saved!');
    }

    public function edit($id){
        $department = Department::find($id);
        // dd($id);
        return view('edit', compact('department'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title'=>'required'
        ]);
        $department = Department::find($id);
        $department->title = $request->title;
        $department->save();

        // dd($request->all());
       return redirect('/index')->with('status', 'Department successfully saved!');
    }

    public function delete($id){
        $department = Department::find($id);
        $department->delete();

        return redirect('/index')->with('status', 'Department deleted successfully!');
    }
}
