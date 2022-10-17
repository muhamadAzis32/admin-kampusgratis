<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory,Uuids;

    protected $table = 'users';
    protected $primaryKey = "id";
    protected $fillable = [
        'name'
    ];
    public function administration()
    {
        return $this->hasOne( Administration::class,'user_id');
    }
    public function DAU(){
        return $this->hasOne(DAU::class,'user_id','id');
    }
    public function NRU(){
        return $this->hasOne(NRU::class,'id');
    }
}
