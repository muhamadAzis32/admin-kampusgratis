<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Uuids;


class MajorSubject extends Model
{
    use HasApiTokens, HasFactory, Notifiable, Uuids;
    protected $table = 'major_subjects';
    protected $primaryKey = "id";
    protected $fillable = [

    ];
    public function subject(){
        return $this->hasOne(Subject::class,'id');
    }
}
