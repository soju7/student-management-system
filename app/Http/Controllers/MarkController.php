<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMarkRequest;
use App\Http\Requests\UpdateMarkRequest;
use App\Repositories\Interfaces\MarkInterface;
use App\Repositories\Interfaces\StudentInterface;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $markRepository;

    public function __construct(MarkInterface $markInterface,StudentInterface $studentInterface)
    {
        $this->markRepository = $markInterface;
        $this->studentRepository = $studentInterface;
    }
    public function index()
    {
        $marks=$this->markRepository->all();
        return view('marks.index',compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $students = $this->studentRepository->all();
       $terms=$this->studentRepository->getTerms();
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
        $mark = $this->markRepository->create([
            'student_id' => $request->get('student_id'),
            'maths' => $request->get('maths'),
            'science' => $request->get('science'),
            'history' => $request->get('history'),
            'term' => $request->get('term')
        ]);
        return redirect('/marks')->with('success', "Mark saved");
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
        $terms=$this->studentRepository->getTerms();
        $mark=$this->markRepository->find($id);
        $students = $this->studentRepository->all();
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
        $mark=$this->markRepository->update([
            'student_id'=>$request->get('student_id'),
            'maths'=>$request->get('maths'),
            'science'=>$request->get('science'),
            'history'=>$request->get('history')
        ],$id);
        return redirect('/marks')->with('success', "Mark updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mark  $Marks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mark =$this->markRepository->delete($id);
        return redirect('/marks')->with('success', "Mark deleted");
    }
}
