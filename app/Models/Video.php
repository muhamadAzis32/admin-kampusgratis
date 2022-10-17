<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuids;

class Video extends Model
{
    use HasFactory, Uuids;

    protected $table = 'videos';
    protected $primaryKey = "id";
    protected $fillable = [
        'url',
        'description',
    ];
}
