<?php

namespace App\Models;

use App\Models\Domain;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $fillable = ["user_id","domain_id","post_id","title","description","category","href","image","date"];

    public function domain(){
        return $this->belongsTo(Domain::class,'domain_id');
    }

    public function user (){
        return $this->belongsTo(User::class,'user_id');
    }
}
