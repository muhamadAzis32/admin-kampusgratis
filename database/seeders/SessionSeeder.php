<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Subject;
use App\Models\Modules;
use App\Models\Document;
use App\Models\Video;
use App\Models\Session;
use App\Models\MajorSubject;
use App\Models\Assignment;
use App\Models\Quiz;

use Illuminate\Support\Str;

class SessionSeeder extends Seeder
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
        function randomSync(){
            if(rand(0,1)==0){
                return FALSE;
            }
            if(rand(0,1)==1){
                return TRUE;
            }
        }
        // $subjects = Subject::get(['id']);
        // $subjectsWithSession = Session::distinct(['id'])->get(['id']);
        // $remainingSubjects = [];

        // for($i=0;$i<count($subjects);$i++){
        //     if(!Session::where("subject_id",$subjects[$i]->id)->exists()){
        //         $randomAmountOfSession = rand(7,8);
        //         for($j=0;$j<$randomAmountOfSession;$j++){
        //             $session_id = Str::uuid();
        //             Modules::create([
        //                 'id'=> Str::uuid(),
        //                 'session_id'=> $session_id,
        //                 'video_id'=>randomVideo(),
        //                 'document_id'=>randomDocument(),
        //             ]);
        //             Session::create([
        //                 'id'=>$session_id,
        //                 'subject_id'=>$remainingSubjects[$i]->id,
        //                 'session_no'=>$j+1,
        //                 'duration'=>3600,
        //                 'is_sync'=>randomSync(),
        //                 'type'=>"sessionType",
        //                 'description'=>"Session Description"
        //             ]);
        //         }
        //     }
        // }
        function randomOneOrTwo(){
            return rand(1,2);
        }
        $subject = MajorSubject::where('major_id','556251ac-3fa8-11ed-b878-0242ac120002')->get('subject_id','name');

        $quiz = json_encode([
            [
                "question"=>'apa itu lukas?',
                "choices"=>array("iya","bener sih","salah","ga tau")
            ],
            [
                "question"=>'apa itu sakl?',
                "choices"=>array("iya","bener sih","salah","ga tau")
            ],
            [
                "question"=>'apa itu telor?',
                "choices"=>array("iya","bener sih","salah","ga tau")
            ],
            [
                "question"=>'apa itu sakl?',
                "choices"=>array("iya","bener sih","salah","ga tau")
            ],
        ]);

        $answer = "{'iya','iya','bener sih'}";
        foreach($subject as $x){
            $session = Session::where('subject_id',$x->subject_id)->get('id','session_no');
            foreach($session as $y){
                // Modules::create([
                //     'id'=> Str::uuid(),
                //     'session_id'=> $y->id,
                //     'video_id'=>randomVideo(),
                //     'document_id'=>randomDocument(),
                // ]);
                // Assignment::create([
                //     'id'=> Str::uuid(),
                //     'session_id'=>$y->id,
                //     'duration'=>3600*randomOneOrTwo(),
                //     'description'=>"This is the description for ".$y->name.", session ".$y->session_no,
                //     'content'=>"This is the module for ".$y->name.", session ".$y->session_no,
                //     'file_assignment'=>"document_assignment/9c7dd7de-e63b-4e96-834f-7c1445f4074e-3768-12121-1-PB.pdf",
                //     'file_assignment_link'=>"https://firebasestorage.googleapis.com/v0/b/kampus-gratis2.appspot.com/o/document_assignment%2F9c7dd7de-e63b-4e96-834f-7c1445f4074e-3768-12121-1-PB.pdf?alt=media&token=bacfd53b-9e24-42d1-9ddc-a307e1f257ca"
                // ]);
                Quiz::create([
                    'id'=>Str::uuid(),
                    'session_id'=>$y->id,
                    'duration'=>3600*randomOneOrTwo(),
                    'description'=>"Quiz for session for ".$y->name.", session ".$y->session_no,
                    'questions'=> $quiz,
                    'answer'=>$answer
                ]);
            }
        }
        // foreach($data as $key=>$value){
        //     $randomAmountOfSession = rand(7,8);
        //     for($j=0;$j<$randomAmountOfSession;$j++){
        //         Session::create([
        //             'id'=>Str::uuid(),
        //             'subject_id'=>$value->subject_id,
        //             'session_no'=>$j+1,
        //             'duration'=>3600*randomOneOrTwo(),
        //             'is_sync'=>randomSync(),
        //             'type'=>"course",
        //             'description'=>"course description"
        //         ]);
        //     }
        // }
    }
}
