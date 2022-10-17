<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use App\Models\User;

class NRU extends Model
{
    use HasFactory,Uuids;

    protected $table = 'new_registered_users';
    protected $primaryKey = "id";

    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }
}
