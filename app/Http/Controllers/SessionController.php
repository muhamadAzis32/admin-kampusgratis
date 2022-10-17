<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Session::all();
            return view('admin.session.index', [
                'data' => $data
            ]);
            // dd($data);
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/session')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            return view('admin.session.create');
        } catch (\Throwable $th) {
            return redirect('/session')->with('toast_error',  'Halaman tidak dapat di akses!');
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
        try {
            Session::create([
                'subject_id' => $request->subject_id,
                'description' => $request->description,
                'session_no' => $request->session_no,
                'type' => $request->type,
                'duration' => $request->duration,
                'is_sync' => $request->is_sync,
            ]);
            return redirect('/session')->with('toast_success', 'Data berhasil ditambah!');
        } catch (\Throwable $th) {
            return redirect('/session')->with('toast_error',  'Data tidak berhasil ditambah!');
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
            $data = Session::find($id);
            return view('admin.session.edit', [
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return redirect('/session')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            Session::where("id", $id)->update([
                'subject_id' => $request->subject_id,
                'description' => $request->description,
                'session_no' => $request->session_no,
                'type' => $request->type,
                'duration' => $request->duration,
                'is_sync' => $request->is_sync,
            ]);
            return redirect('/session')->with('toast_success', 'Data berhasil diubah!');
        } catch (\Throwable $th) {
            return redirect('/session')->with('toast_error',  'Data tidak berhasil diubah!');
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
            Session::where('id', $id)->delete();
            return redirect('/session')->with('toast_success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('/session')->with('toast_error',  'Data tidak berhasil dihapus!');
        }
    }
}
