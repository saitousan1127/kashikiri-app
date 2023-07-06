<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class US extends Model
{
    use HasFactory;

    protected $table = "u_s";

    public function user(){
        return $this->belongsTo(User::class);
    }
}
