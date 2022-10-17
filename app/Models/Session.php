<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

use App\Models\Subject;

class Session extends Model
{
    use HasFactory,Uuids;

    protected $table = 'sessions';
    protected $primaryKey = "id";
    protected $fillable = [
        'subject_id',
        'session_no',
        'duration',
        'is_sync',
        'type',
        'description',
    ];
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
