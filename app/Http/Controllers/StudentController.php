<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Repositories\Interfaces\StudentInterface;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $studentRepository;

    public function __construct(StudentInterface $studentInterface)
    {
        $this->studentRepository = $studentInterface;
    }

    public function index()
    {
        $students = $this->studentRepository->all();
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers=$this->studentRepository->getTeachers();
        return view('students.create',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $student=$this->studentRepository->create([
            'name' => $request->get('name'),
            'age' => $request->get('age'),
            'gender' => $request->get('gender'),
            'reporting_teacher' => $request->get('reporting_teacher')
        ]);

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
        $student = $this->studentRepository->find($id);
        $teachers=$this->studentRepository->getTeachers();
        return view('students.edit', compact('student','teachers'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, $id)
    {   
        $student = $this->studentRepository->update([
            'name' => $request->get('name'),
            'age' => $request->get('age'),
            'gender' => $request->get('gender'),
            'reporting_teacher' => $request->get('reporting_teacher')
        ],$id);
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
        $this->studentRepository->delete($id);
        return redirect('/students')->with('success', 'Student deleted!');
    }
}
