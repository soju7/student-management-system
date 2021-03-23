<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMarkRequest;
use App\Http\Requests\UpdateMarkRequest;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = Mark::all();
        return view('marks.index',compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $students = Student::select('id','name')->get();
       $terms=['one','two'];
       return view('marks.create',compact('terms','students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarkRequest $request)
    {
        // $request->validate([
        //     'student_id'=>'required',
        //     'maths'=>'required|integer',
        //     'science'=>'required|integer',
        //     'history'=>'required|integer',
        //     'term'=>'required'
        // ]);


        $mark = new Mark([
            'student_id' => $request->get('student_id'),
            'maths' => $request->get('maths'),
            'science' => $request->get('science'),
            'history' => $request->get('history'),
            'term' => $request->get('term')
        ]);
        $mark->save();

        return redirect('/marks')->with('success', "Mark saved for ".$mark->student->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marks  $Marks
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marks  $Marks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $terms=['one','two'];
        $mark = Mark::find($id);
        $students = Student::select('id','name')->get();
        return view('marks.edit', compact('mark','students','terms'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marks  $Marks
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMarkRequest $request, $id)
    {
        // $request->validate([
        //     'student_id'=>'required',
        //     'maths'=>'required|integer',
        //     'science'=>'required|integer',
        //     'history'=>'required|integer',
        //     'term'=>'required'
        // ]);

        $mark = Mark::find($id);
        $mark->student_id =  $request->get('student_id');
        $mark->maths = $request->get('maths');
        $mark->science = $request->get('science');
        $mark->history = $request->get('history');
        $mark->save();

        return redirect('/marks')->with('success', "Mark updated for ".$mark->student->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mark  $Marks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mark = Mark::find($id);
        $mark->delete();

        return redirect('/marks')->with('success', "Mark deleted for ".$mark->student->name);
    }
}
