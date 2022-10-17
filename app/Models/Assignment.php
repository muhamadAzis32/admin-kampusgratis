<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuids;

class Assignment extends Model
{
    use HasFactory,Uuids;
    protected $table = 'assignments';
    protected $primaryKey = "id";
    protected $fillable = [
        'session_id',
        'duration',
        'description',
        'content',
        'document_id',
    ];
}
