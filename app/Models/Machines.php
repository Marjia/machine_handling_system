<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machines extends Model
{
    public function taggedUsersMachines(){

        return $this->hasMany(TaggedUsersMachines::class);
    }
}
