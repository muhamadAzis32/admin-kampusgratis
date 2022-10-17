<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Session;
use App\Models\Quiz;

use Illuminate\Support\Str;

class QuizSeeder extends Seeder
{
    public function run()
    {
        $data = Session::get('id');
        $test = [
            "type"=>"test"
        ];
        // foreach($data as $x){
        //     Quiz::create([
        //         'id'=>Str::uuid(),
        //         'session_id'=>$x->id,
        //         'duration'=>3600,
        //         'questions'=>$questions,
        //     ]);
        // }
    }
}
