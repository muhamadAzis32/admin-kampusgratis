<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Subject;
use App\Models\Major;
use App\Models\MajorSubject;

use Illuminate\Support\Str;

class MajorSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = Subject::get(['id']);
        $majors = Major::get(['id']);
        for($i=0;$i<count($majors);$i++){
            for($j=0;$j<16;$j++){
                if($i != 55){
                    MajorSubject::create([
                        'id'=> Str::uuid(),
                        'major_id'=>$majors[$i]->id,
                        'subject_id'=>getRandomID($subjects),
                        'semester'=>$j%9,
                        'degree'=>"S1"
                    ]);
                }

            }
        }

        // $majorSubject = MajorSubject::get(['id']);
        // for($i=0;$i<count($majorSubject);$i++){
        //     $majorSubject[$i]->degree = "S1";
        //     $majorSubject[$i]->semester = getRandomSemester();
        //     $majorSubject[$i]->save();
        // }
    }
}
function getRandomID($table){
    if(rand(0,count($table))!=55){
        return $table[rand(0,count($table))]->id;
    }
    else{
        echo 'huh';
    }
}
function getRandomSemester(){
    return (string)rand(1,9);
}
