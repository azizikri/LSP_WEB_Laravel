<?php

namespace App\Http\Controllers;

use App\Models\Teaching;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;

use Illuminate\Http\Request;

class TeachingController extends Controller
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
        $teacher = Teacher::latest()->get();
        $classroom = Classroom::latest()->get();
        $subject = Subject::latest()->get();
        return view('teaching.index', \compact('classroom', 'subject', 'teacher', 'teaching'));
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
            'classroom_id' => ['required', 'max:10'],
            'subject_id' => ['required', 'max:10'],
            'teacher_id' => ['required', 'max:10'],
        ]);

        Teaching::create([
            'classroom_id' => $request->classroom_id,
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function show(Teaching $teaching)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function edit(Teaching $teaching)
    {
        $teacher = Teacher::latest()->get();
        $classroom = Classroom::latest()->get();
        $subject = Subject::latest()->get();
        return view('teaching.edit', \compact('classroom', 'subject', 'teacher', 'teaching'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teaching $teaching)
    {
        $this->validate($request, [
            'classroom_id' => ['required', 'max:10'],
            'subject_id' => ['required', 'max:10'],
            'teacher_id' => ['required', 'max:10'],
        ]);

        Teaching::where('id', $teaching->id)->update([
            'classroom_id' => $request->classroom_id,
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
        ]);

        return \redirect()->route('teaching.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teaching $teaching)
    {
        $teaching->delete();

        return back();
    }
}
