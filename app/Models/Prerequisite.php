<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Prerequisite extends Model
{
    use HasFactory,Uuids;

    protected $table = 'prerequisites';
    protected $primaryKey = "id";

    protected $fillable = [
        'subject_id',
        'prerequisites',
        'updated_at',
        'created_at'
    ];
}
