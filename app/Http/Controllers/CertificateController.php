<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Subject;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = Certificate::all();

        return view('admin.certificate.index', [
            'data' =>  $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $showListUser = Certificate::all();

        $listUserNotCerttificated = DB::table('Certificates')->select('*')->where('file')->value(NULL || "");

        // dd($listUserNotCerttificated);

        return view('admin.certificate.create', [
            'listUser' => $showListUser,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student_name = $request->student_select;
        $subject_name = $request->subject_select;

        try {
            //code...
        } catch (\Throwable $th) {
            return redirect('/certificate-create')->with('toast_error',  'Failed upload certificate!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate, Request $request)
    {
        try {
            dd($request);
            $selected = $request->selected;

            dd($selected);
        } catch (\Throwable $th) {
            return redirect('/certificate-create')->with('toast_error',  'Halaman tidak dapat di akses!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        //
    }
}
