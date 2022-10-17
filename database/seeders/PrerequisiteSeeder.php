<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Subject;
use App\Models\Prerequisite;
use Carbon\Carbon;

use Illuminate\Support\Str;

class PrerequisiteSeeder extends Seeder
{
    public function run()
    {
        $advancedAndIntermediate = Subject::where('level','Intermediate')->orWhere('level','Advanced')->get('id');
        $beginner = Subject::where('level','Basic')->get('id');
        function randomBeginnerSubject($beginner){
            return $beginner[rand(0,count($beginner))]->id;
        }
        foreach($advancedAndIntermediate as $x){
            $randomPrerequisite = rand(1,4);
            for($i = 0; $i<$randomPrerequisite ; $i++){
                Prerequisite::create([
                    'id' => Str::uuid(),
                    'subject_id'=> $x->id,
                    'prerequisite_subject_id' => randomBeginnerSubject($beginner),
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()
                ]);
            }
        }
    }
}
