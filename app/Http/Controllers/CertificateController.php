<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Subject;
use GuzzleHttp\Psr7\MimeType;
use Illuminate\Http\Request;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Auth\SignInResult\SignInResult;
use Kreait\Firebase\Exception\FirebaseException;
use Google\Cloud\Firestore\FirestoreClient;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use App\Models\Session;

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
            $selected = $request->selected;
            $file = $request->file('file');
            $fileOriginalName = $request->file('file')->getClientOriginalName();
            $rawFileName = pathinfo($fileOriginalName, PATHINFO_FILENAME);
            // dd($rawFileName);

            $document   = app('firebase.firestore')->database()->collection('document/certificate/')->document($rawFileName);
            $firebase_storage_path = 'documents/certificate/';
            $name = $document->id();
            $localfolder = public_path('firebase-temp-uploads') . '/';
            $extension = $file->getClientOriginalExtension();

            // if (!in_array($extension, ['pdf', 'doc', 'docx'])) {
            //     return redirect('/document')->with('toast_error', 'Wrong File Format');
            // }
            $fileName = $name . '.' . $extension;
            dd($fileName);

            if ($file->move($localfolder, $fileName)) {
                $uploadedfile = fopen($localfolder . $fileName, 'r');
                app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $fileName]);
                unlink($localfolder . $fileName);
                Session::flash('message', 'Succesfully Uploaded');
            }

            $filePath = "documents/certificate/" . $fileName;
            $expiresAt = new \DateTime('12th December Next Year');
            $linkReference = app('firebase.storage')->getBucket()->object($filePath);
            if ($linkReference->exists()) {
                $link = $linkReference->signedUrl($expiresAt);
            } else {
                $link = null;
            }

            Certificate::where("id", $selected)->update([
                'link' => $link,
                'file' => $filePath
            ]);

            dd($file);
        } catch (\Throwable $th) {
            dd($th);
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
