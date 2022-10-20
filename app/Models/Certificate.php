<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Certificate extends Model
{
    use HasFactory, Uuids;

    protected $table = 'Certificates';
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'student_id',
        'subject_id',
        'id_certificate',
        'file',
        'link'
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function student()
    {
        return $this->hasOne(Students::class, 'id', 'student_id');
    }
    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }
    public function studentSubject()
    {
        return $this->hasOne(StudentSubject::class, 'subject_id', 'subject_id');
    }
}
