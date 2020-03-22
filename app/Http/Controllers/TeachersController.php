<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $teachers = Teacher::all();
        return view('teacher.index', \compact('teachers'));
        // return \view('teacher.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return \view('teacher.create');
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
        'nama' => 'required|max:100|min:4',
        'nig' => 'required|size:5',
        'ttl' => 'required',
        'no_tlp' => 'required|max:12',
        'jabatan' => 'required',
        'mp' => 'required',
        'status' => 'required'

        ]);

        $teachers = Teacher::create([
            'nama' => $request->nama,
            'nig' => $request->nig,
            'ttl' => $request->ttl,
            'no_tlp' => $request->no_tlp,
            'jabatan' => $request->jabatan,
            'mp' => $request->mp,
            'status' => $request->status
        ]);

        return redirect('teacher')->with('status', 'Berhasil di add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
        return view('teacher.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
        return \view('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //

        Teacher::where('id', $teacher->id)->update([
            'nama' => $request->nama,
            'nig' => $request->nig,
            'ttl' => $request->ttl,
            'no_tlp' => $request->no_tlp,
            'jabatan' => $request->jabatan,
            'mp' => $request->mp,
            'status' => $request->status
        ]);
        return redirect('teacher')->with('status', 'Berhasil di update');
        // return $request;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($teacher)
    {
        //
        $teacher = Teacher::findOrFail($teacher);
        $teacher->delete();
        // return redirect()->route('teacher.index');
        return redirect('teacher')->with('status', 'Berhasil di hapus');
    }
}
