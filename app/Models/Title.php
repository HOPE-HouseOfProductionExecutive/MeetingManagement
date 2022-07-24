<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    public function meeting(){
        return $this->hasMany(Meetings::class, "title_id", "id");
    }
}
