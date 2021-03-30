<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaggedUsersMachines extends Model
{
    public function users(){
        
        return $this->belongsTo(User::class);
    }

    public function machines(){
        
        return $this->belongsTo(Machines::class);
    }

    public function userSessions(){

        return $this->hasMany(UserSessions::class);
    }
}
