<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Video::all();
            return view('admin.video.index', [
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/video')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            $data = Video::all();

            return view('admin.video.create', [
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return redirect('/video')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            Video::create([
                'url'=>$request->url,
                'description'=>$request->description
            ]);
            return redirect('/video')->with('toast_success', 'Data berhasil ditambah!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/video')->with('toast_error',  'Data tidak berhasil ditambah!');
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
            $data = Video::find($id);
            return view('admin.video.edit', [
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return redirect('/video')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            Video::where("id", $id)->update([
                'url'=>$request->url,
                'description'=>$request->description
            ]);
            return redirect('/video')->with('toast_success', 'Data berhasil diubah!');
        } catch (\Throwable $th) {
            return redirect('/video')->with('toast_error',  'Data tidak berhasil diubah!');
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
            Video::where('id', $id)->delete();
            return redirect('/video')->with('toast_success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('/video')->with('toast_error',  'Data tidak berhasil dihapus!');
        }
    }
}
