<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
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
        $major = Major::latest()->get();
        return view('major.index', \compact('major'));
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
            'kode' => ['required', 'max:10'],
            'jurusan' => ['required', 'max:255'],
        ]);

        Major::create([
            'kode' => $request->kode,
            'jurusan' => $request->jurusan,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function show(Major $major)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function edit(Major $major)
    {
        return view('major.edit', \compact('major'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Major $major)
    {
        $this->validate($request, [
            'kode' => ['required', 'max:10'],
            'jurusan' => ['required', 'max:255'],
        ]);

        Major::where('id', $major->id)->update([
            'kode' => $request->kode,
            'jurusan' => $request->jurusan,
        ]);
        return redirect()->route('major.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {
        $major->delete();

        return back();
    }
}
