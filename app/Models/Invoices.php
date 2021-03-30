<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    public function userSessions(){
        
        return $this->hasMany(UserSessions::class);
    }
}
