<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Major;

use Illuminate\Http\Request;

class ClassroomController extends Controller
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
        $major = Major::latest()->get();
        return view('classroom.index', \compact('classroom', 'major'));
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
            'major_id' => ['required', 'max:10'],
            'kelas' => ['required', 'max:255'],
        ]);

        Classroom::create([
            'major_id' => $request->major_id,
            'kelas' => $request->kelas,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        $major = Major::latest()->get();
        return view('classroom.edit', \compact('classroom', 'major'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        $this->validate($request, [
            'major_id' => ['required', 'max:10'],
            'kelas' => ['required', 'max:255'],
        ]);

        Classroom::where('id', $classroom->id)->update([
            'major_id' => $request->major_id,
            'kelas' => $request->kelas,
        ]);

        return \redirect()->route('classroom.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        return back();
    }
}
