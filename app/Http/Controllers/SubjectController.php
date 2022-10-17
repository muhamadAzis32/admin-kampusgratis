<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Lecturers;


class SubjectController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Subject::all();
            $lecturer = Lecturers::all();
            $test = convertPsqlArray($data,"lecturer");
            return view('admin.subject.index', [
                'data' => $data,
                'lecturer'=>$lecturer
            ]);
            // dd($data);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $data = Lecturers::all();
            return view('admin.subject.create',[
                'data'=> $data
            ]);
        } catch (\Throwable $th) {
            return redirect('/subjects')->with('toast_error',  'Halaman tidak dapat di akses!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->lecturers);
        try {
            Subject::create([
                'name' => $request->name,
                'number_of_sessions' => $request->number_of_sessions,
                'level' => $request->level,
                'lecturer' => $request->lecturers,
                'degree' => $request->degree,
                'credit' => $request->credits,
                'description' => $request->description,
            ]);
            return redirect('/subjects')->with('toast_success', 'Data berhasil ditambah!');
        } catch (\Throwable $th) {
            dd($th);
            // return redirect('/subjects')->with('toast_error',  'Data tidak berhasil ditambah!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data = Subject::find($id);
            return view('admin.subject.edit', [
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return redirect('/subjects')->with('toast_error',  'Halaman tidak dapat di akses!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            Subject::where("id", $id)->update([
                'name' => $request->name,
                'number_of_sessions' => $request->number_of_sessions,
                'level'=> $request->level,
                'lecturer'=> $request->lecturer,
                'degree'=>$request->degree,
                'credit'=>$request->credits,
                'description' => $request->description
            ]);
            return redirect('/subjects')->with('toast_success', 'Data berhasil diubah!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/subjects')->with('toast_error',  'Data tidak berhasil diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Subject::where('id', $id)->delete();
            return redirect('/subjects')->with('toast_success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
