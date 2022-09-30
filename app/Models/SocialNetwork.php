<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
    use HasFactory;
    protected $table = "social_networks";
    protected $fillable = ["user_id","title","url","username"];

    public function user (){
        return $this->belongsTo(User::class,'user_id');
    }
}
