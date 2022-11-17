<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use App\Casts\PgsqlArray;

class MaterialEnrolled extends Model
{
    use HasFactory,Uuids;

    protected $table = 'material_enrolleds';
    protected $primaryKey = "id";
    protected $fillable = [
        'activity_detail'
    ];
    protected $casts = [
        'activity_detail' => 'array'
    ];
    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }
    public function session()
    {
        return $this->belongsTo(Session::class,'session_id');
    }
}
