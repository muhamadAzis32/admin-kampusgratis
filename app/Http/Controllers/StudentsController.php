<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Students::all();
            // $countMajor = $data->map->only(['major_id']);
            // $overallQuery = [];
            // for($i=0;$i<2;$i++){
            //     $currentQuery = DB::select('select major_id[?] from students',[$i+1]);
            //     $overallQuery = array_merge($overallQuery,$currentQuery);
            // }
            return view('admin.students.index', [
                'data' => $data,
                // 'major' => $overallQuery
            ]);
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/dashboard-admin')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            $user = User::all();

            return view('admin.students.create', [
                'user' => $user
            ]);
        } catch (\Throwable $th) {
            return redirect('/students')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            $i = 0;
            for($i=0;$i<count($request->major_id);$i++){
                if($i==0){
                    $major = "{".$request->major_id[$i];
                }
                if($i!==0){
                    $major.=$request->major_id[$i];
                }
                if($i<count($request->major_id)-1){
                    $major .= "," ;
                }
            }
            $major.="}";
            Students::create([
                'user_id' => $request->user_id,
                'major_id' => $major,
            ]);
            return redirect('/students')->with('toast_success', 'Data berhasil ditambah!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/students')->with('toast_error',  'Data tidak berhasil ditambah!');
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
            $major = Major::all();
            $user = User::all();

            $data = Students::find($id);
            return view('admin.students.edit', [
                'data' => $data,
                'major' => $major,
                'user' => $user
            ]);
        } catch (\Throwable $th) {
            return redirect('/students')->with('toast_error',  'Halaman tidak dapat di akses!');
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

            Students::where("id", $id)->update([
                'user_id' => $request->user_id,
                'major_id' => $request->major_id,
            ]);
            return redirect('/students')->with('toast_success', 'Data berhasil diubah!');
        } catch (\Throwable $th) {
            return redirect('/students')->with('toast_error',  'Data tidak berhasil diubah!');
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
            Students::where('id', $id)->delete();
            return redirect('/students')->with('toast_success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('/students')->with('toast_error',  'Data tidak berhasil dihapus!');
        }
    }
}
