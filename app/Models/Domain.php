<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;
    protected $table = "domains";
    protected $fillable = ["user_id","name","url","url_http"];


    public function user (){
        return $this->belongsTo(User::class,'user_id');
    }
}
