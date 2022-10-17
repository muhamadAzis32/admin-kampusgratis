<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Modules;
use App\Models\Session;
use App\Models\Document;
use App\Models\Video;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Modules::all();
            $document = Document::all();
            $video = Video::all();
            $docTaken = DB::select('SELECT id, session_id ,
                        array_to_json(video_id) as video_id,
                        array_to_json(document_id) as document_id
                        FROM modules');

            foreach($docTaken as $x){
                $x->document_id = json_decode($x->document_id);
                $x->video_id = json_decode($x->video_id);
            }
            foreach($data as $x){
                foreach($docTaken as $y){
                    if($x->id == $y->id){
                        $x->video_id = $y->video_id;
                        $x->document_id = $y->document_id;
                    }
                }
            }
            return view('admin.modules.index', [
                'data' => $data,
                'video' => $video,
                'document' => $document
            ]);
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/modules')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            $data = Modules::all();
            $session = Session::all();
            $document = Document::all();
            $video = Video::all();

            return view('admin.modules.create',[
                'data'=> $data,
                'session'=>$session,
                'document'=>$document,
                'video'=>$video
            ]);
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/modules')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            $video = storeVideoIntoDB($request);
            $document = storeDocumentIntoDB($request);

            Modules::create([
                'session_id' => $request->session_id,
                'video_id' => $video,
                'document_id' => $document,
            ]);
            return redirect('/modules')->with('toast_success', 'Data berhasil ditambah!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/modules') ->with('toast_error',  'Data tidak berhasil ditambah!');
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
            $data = Modules::find($id);
            $session = Session::all();
            $document = Document::all();
            $video = Video::all();
            $documentTaken = getDocTakenEdit($data);
            $videoTaken = getVideoTakenEdit($data);

            return view('admin.modules.edit', [
                'data'=> $data,
                'session'=>$session,
                'document'=>$document,
                'video'=>$video,
                'moduleVideo'=>$videoTaken,
                'moduleDocument'=>$documentTaken
            ]);
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/modules')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            $video = getRequestedVideo($request);
            $document = getRequestedDocument($request);

            Modules::where("id", $id)->update([
                'session_id' => $request->session_id,
                'video_id' => $video,
                'document_id' => $document,
            ]);
            return redirect('/modules')->with('toast_success', 'Data berhasil diubah!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/modules')->with('toast_error',  'Data tidak berhasil diubah!');
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
            Modules::where('id', $id)->delete();
            return redirect('/modules')->with('toast_success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('/modules')->with('toast_error',  'Data tidak berhasil diubah!');
        }
    }
}
