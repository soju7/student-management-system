<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers=['katie','max','alex'];
        return view('students.create',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'age'=>'required|integer',
            'gender'=>'required',
            'reporting_teacher'=>'required'
        ]);

        $student = new Student([
            'name' => $request->get('name'),
            'age' => $request->get('age'),
            'gender' => $request->get('gender'),
            'reporting_teacher' => $request->get('reporting_teacher')
        ]);
        $student->save();

        return redirect('/students')->with('success', 'Student saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $teachers=['katie','max','alex'];
        return view('students.edit', compact('student','teachers'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'age'=>'required|integer',
            'gender'=>'required',
            'reporting_teacher'=>'required'
        ]);

        $student = Student::find($id);
        $student->name =  $request->get('name');
        $student->age = $request->get('age');
        $student->gender = $request->get('gender');
        $student->reporting_teacher = $request->get('reporting_teacher');
        $student->save();

        return redirect('/students')->with('success', 'Student updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect('/students')->with('success', 'Student deleted!');
    }
}
