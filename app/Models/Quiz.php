<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Quiz extends Model
{
    use HasFactory,Uuids;

    protected $table = 'quizzes';
    protected $primaryKey = "id";

    protected $fillable = [
        'session_id',
        'duration',
        'description',
        'questions',
        'answer'
    ];

    public function session(){
        return $this->belongsTo(Session::class);
    }
}
