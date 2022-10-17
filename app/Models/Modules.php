<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use App\Casts\PgsqlArray;

class Modules extends Model
{
    use HasFactory,Uuids;

    protected $table = 'modules';
    protected $primaryKey = "id";
    protected $fillable = [
        'session_id',
        'video_id',
        'document_id',
    ];
    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }
    public function document()
    {
        return $this->hasMany(Document::class,'document_id');
    }
}
