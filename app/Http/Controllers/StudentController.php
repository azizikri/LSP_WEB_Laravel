<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classroom = Classroom::latest()->get();
        $student = Student::latest()->get();
        return view('student.index', \compact('classroom', 'student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'classroom_id' => ['required', 'max:10'],
            'nis' => ['required', 'max:12'],
            'nisn' => ['required', 'max:9'],
            'nama' => ['required', 'max:255'],
            'gender' => ['required', 'max:20'],
        ]);

        Student::create([
            'classroom_id' => $request->classroom_id,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'gender' => $request->gender,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $classroom = Classroom::latest()->get();
        return view('Student.edit', \compact('student', 'classroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'classroom_id' => ['required', 'max:10'],
            'nis' => ['required', 'max:12'],
            'nism' => ['required', 'max:9'],
            'nama' => ['required', 'max:255'],
            'gender' => ['required', 'max:20'],
        ]);

        Student::where('id', $student->id)->update([
            'classroom_id' => $request->classroom_id,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'gender' => $request->gender,
        ]);

        return \redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return back();
    }
}
