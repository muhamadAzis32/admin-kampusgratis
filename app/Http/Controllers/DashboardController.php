<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

use App\Models\DAU;
use App\Models\NRU;
use App\Models\Students;
use App\Models\Lecturers;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        try{
            $DAUdata = DAU::orderBy('created_at','DESC')->get();
            $NRUdata = NRU::orderBy('created_at','DESC')->get();
            $StudentData = Students::all();
            $LecturerData = Lecturers::all();
            $now = Carbon::today();

            return view('admin.dashboard',[
                'DAUdata'=>$DAUdata,
                'NRUdata'=>$NRUdata,
                'StudentData'=>$StudentData,
                'LecturerData'=>$LecturerData,
                'now'=>$now
            ]);
        }
        catch(\Throwable $th){
            dd($th);
        }
    }
}


