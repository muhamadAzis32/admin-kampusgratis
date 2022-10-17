<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuids;

class StudentSubject extends Model
{
    use HasFactory, Uuids;

    protected $table = 'student_subjects';
    protected $primaryKey = "id";
    protected $fillable = [
        'status'
    ];
    public function student(){
        return $this->hasOne(Students::class,'id','student_id');
    }
    public function subject(){
        return $this->hasOne(Subject::class,'id','subject_id');
    }
}
