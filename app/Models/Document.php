<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuids;

class Document extends Model
{
    use HasFactory, Uuids;

    protected $table = 'documents';
    protected $primaryKey = "id";
    protected $fillable = [
        'file',
        'description',
        'link'
    ];
}
