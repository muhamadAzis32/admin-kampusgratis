<?php

namespace App\Models;

use App\Models\User;
use App\Models\Major;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Students extends Model
{
    use HasFactory, Uuids;

    protected $table = 'students';
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'major_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }
    public function subject()
    {
        return $this->hasMany(StudentSubject::class, 'student_id');
    }
}
