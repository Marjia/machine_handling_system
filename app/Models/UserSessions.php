<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSessions extends Model
{
    public function taggedUsersMachines(){

        return $this->belongsTo(TaggedUsersMachines::class);
    }

    public function invoices(){

        return $this->belongsTo(Invoices::class);
    }
    // 
    // public function endSession(){
    //     $this->end_time = Carbon::now();
    // }
}
