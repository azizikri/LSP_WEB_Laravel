<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Teaching;
use Illuminate\Http\Request;

class GradeController extends Controller
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
        $teaching = Teaching::latest()->get();
        $grade = Grade::latest()->get();
        $student = Student::latest()->get();
        return view('grade.index', \compact('student', 'grade', 'teaching'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'teaching_id' => ['required', 'max:10'],
            'student_id' => ['required', 'max:10'],
            'uts' => ['required', 'max:3'],
            'uas' => ['required', 'max:3'],
            'uh' => ['required', 'max:3'],
            'tugas' => ['required', 'max:3'],
        ]);
        $nilai_akhir = ($request->uts + $request->uas + $request->tugas) / 3;
        Grade::create([
            'teaching_id' => $request->teaching_id,
            'student_id' => $request->student_id,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'uh' => $request->uh,
            'tugas' => $request->tugas,
            'nilai_akhir' => $nilai_akhir,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        $teaching = Teaching::latest()->get();
        $student = Student::latest()->get();
        return view('grade.edit', \compact('student', 'grade', 'teaching'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $this->validate($request, [
            'teaching_id' => ['required', 'max:10'],
            'student_id' => ['required', 'max:10'],
            'uts' => ['required', 'max:3'],
            'uas' => ['required', 'max:3'],
            'uh' => ['required', 'max:3'],
            'tugas' => ['required', 'max:3'],
        ]);
        $nilai_akhir = ($request->uts + $request->uas + $request->tugas) / 3;
        Grade::where('id', $grade->id)->update([
            'teaching_id' => $request->teaching_id,
            'student_id' => $request->student_id,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'uh' => $request->uh,
            'tugas' => $request->tugas,
            'nilai_akhir' => $nilai_akhir,
        ]);

        return \redirect()->route('grade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();

        return back();
    }
}
