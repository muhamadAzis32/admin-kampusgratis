<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Auth\SignInResult\SignInResult;
use Kreait\Firebase\Exception\FirebaseException;
use Google\Cloud\Firestore\FirestoreClient;
use Session;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Document::all();
            return view('admin.document.index', [
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return redirect('/document')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            $data = Document::all();

            return view('admin.document.create');

        } catch (\Throwable $th) {
            return redirect('/document')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            $request->validate([
                'file' => 'required',
            ]);
            $input = $request->all();
            $file = $request->file('file');
            $originalFileName = $file->getClientOriginalName();
            $rawFileName = pathinfo($originalFileName, PATHINFO_FILENAME);

            $document   = app('firebase.firestore')->database()->collection('module_documents')->document($rawFileName);
            $firebase_storage_path = 'module_documents/';
            $name = $document->id();
            $localfolder = public_path('firebase-temp-uploads') .'/';
            $extension = $file->getClientOriginalExtension();

            if(!in_array($extension,['pdf','doc','docx'])){
                return redirect('/document')->with('toast_error', 'Wrong File Format');
            }

            $fileName = $name. '.' . $extension;

            if ($file->move($localfolder, $fileName)) {
                $uploadedfile = fopen($localfolder.$fileName, 'r');
                app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $fileName]);
                unlink($localfolder . $fileName);
                Session::flash('message', 'Succesfully Uploaded');
            }
            $filePath = "module_documents/".$fileName;
            $expiresAt = new \DateTime('12th December Next Year');
            $linkReference = app('firebase.storage')->getBucket()->object($filePath);
            if ($linkReference->exists()) {
                $link = $linkReference->signedUrl($expiresAt);
              } else {
                $link = null;
            }
            Document::create([
                'file' => $originalFileName,
                'description' => $data->description,
                'link'=> $link
            ]);

            return redirect('/document')->with('toast_success', 'Data berhasil ditambah!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/document')->with('toast_error',  'Data tidak berhasil ditambah!');
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
            $data = Document::find($id);

            return view('admin.document.edit', [
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return redirect('/document')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            Document::where("id", $id)->update([
                'file' => $request->file,
                'description' => $request->description
            ]);
            return redirect('/document')->with('toast_success', 'Data berhasil diubah!');
        } catch (\Throwable $th) {
            return redirect('/document')->with('toast_error',  'Data tidak berhasil diubah!');
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
            Document::where('id', $id)->delete();
            return redirect('/document')->with('toast_success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('/document')->with('toast_error',  'Data tidak berhasil dihapus!');
        }
    }
}
