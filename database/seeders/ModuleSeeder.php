<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Subject;
use App\Models\Major;
use App\Models\MajorSubject;
use App\Models\Modules;
use App\Models\Document;
use App\Models\Video;
use App\Models\Session;

use Illuminate\Support\Str;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        function randomVideo(){
            $video = Video::all();
            $randomVideo = rand(0,count($video)-1);
            return "{".$video[$randomVideo]->id."}";
        }
        function randomDocument(){
            $document = Document::all();
            $randomDocument = rand(0,count($document)-1);
            return "{".$document[$randomDocument]->id."}";
        }
        $subject = MajorSubject::where("major_id","556251ac-3fa8-11ed-b878-0242ac120002")->get('subject_id');
        foreach($subject as $x){
            $session = Session::where('subject_id',$x->subject_id)->get(['id','session_no']);
            foreach($session as $y){
                Modules::create([
                    'id'=> Str::uuid(),
                    'session_id'=>$y->id,
                    'video_id'=>randomVideo(),
                    'document_id'=>randomDocument(),
                ]);
            }
        }
    }
}
