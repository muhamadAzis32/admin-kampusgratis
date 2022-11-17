<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\assignment;
use App\Models\MaterialEnrolled;

class AssignmentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Assignment::all();
            return view('admin.assignment.index', [
                'data' => $data
            ]);
            // dd($data);
        } catch (\Throwable $th) {
            return redirect('/assignment')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            $data = Assignment::all();
            return view('admin.assignment.create',[
                'data'=> $data
            ]);
        } catch (\Throwable $th) {
            return redirect('/assignment')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            Assignment::create([
                'session_id'=>$request->session_id,
                'duration'=>$request->duration,
                'description'=>$request->description,
                'content'=>$request->content,
                'document_id'=>$request->document_id,
            ]);
            return redirect('/assignment')->with('toast_success', 'Data berhasil ditambah!');
        } catch (\Throwable $th) {
            return redirect('/assignment') ->with('toast_error',  'Data tidak berhasil ditambah!');
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
            $data = Assignment::find($id);
            return view('admin.assignment.edit', [
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return redirect('/assignment')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            Assignment::where("id", $id)->update([
                'session_id'=>$request->session_id,
                'duration'=>$request->duration,
                'description'=>$request->description,
                'content'=>$request->content,
                'document_id'=>$request->document_id,
            ]);
            return redirect('/assignment')->with('toast_success', 'Data berhasil diubah!');
        } catch (\Throwable $th) {
            return redirect('/assignment')->with('toast_error',  'Data tidak berhasil diubah!');
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
            Assignment::where('id', $id)->delete();
            return redirect('/assignment')->with('toast_success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('/assignment')->with('toast_error',  'Data tidak berhasil diubah!');
        }
    }

    public function check()
    {
        try {
            $data = MaterialEnrolled::where('type','ASSIGNMENT')->where('status','ONGOING')->get(['id','subject_id','created_at','activity_detail','student_id','session_id','type']);
            return view('admin.assignment.check', [
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return redirect('/assignment')->with('toast_error',  'Data tidak berhasil diubah!');
        }
    }
    public function checkuser($id)
    {
        try {
            $data = MaterialEnrolled::where('id',$id)->first(['id','student_id','session_id',"subject_id",'activity_detail']);
            return view('admin.assignment.checkuser', [
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/assignment')->with('toast_error',  'Data tidak berhasil diubah!');
        }
    }
}
