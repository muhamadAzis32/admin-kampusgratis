<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Session;
use App\Models\Subject;
use App\Models\Major;
use App\Models\MajorSubject;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Quiz::limit(10)->get(['session_id','id','duration']);
            $subject = [];
            return view('admin.quiz.index', [
                'data' => $data,
                'subject'=>$subject
            ]);
        } catch (\Throwable $th) {
            return redirect('/quiz')->with('toast_error',  'Halaman tidak dapat di akses!');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMajorsSubject($id)
    {
        try {
            $data = MajorSubject::where('major_id',$id)->get();
            return response()->json(['subject'=>$data]);
        } catch (\Throwable $th) {
            return redirect('/quiz')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            $major = Major::limit(30)->get(['id','name']);
            $subject = MajorSubject::where('major_id','556251ac-3fa8-11ed-b878-0242ac120002')->get();
            return view('admin.quiz.create', [
                'major'=>$major,
                'subject'=>$subject
            ]);
        } catch (\Throwable $th) {
            return redirect('/quiz')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            Quiz::create(
                [
                    'questions' => json_encode($request->questions),
                    'answer' => str_replace(['[', ']'], ['{', '}'],json_encode($request->answer)),
                ]);
            return redirect('/quiz')->with('toast_success', 'Data berhasil ditambah!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/quiz')->with('toast_error',  'Data tidak berhasil ditambah!');
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
            $data = Quiz::find($id);
            return view('admin.quiz.edit', [
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return redirect('/quiz')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            Quiz::where("id", $id)->update([
                'user_id' => $request->user_id,
            ]);
            return redirect('/quiz')->with('toast_success', 'Data berhasil diubah!');
        } catch (\Throwable $th) {
            return redirect('/quiz')->with('toast_error',  'Data tidak berhasil diubah!');
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
            Quiz::where('id', $id)->delete();
            return redirect('/quiz')->with('toast_success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('/quiz')->with('toast_error',  'Data tidak berhasil dihapus!');
        }
    }
}