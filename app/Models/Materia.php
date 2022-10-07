<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $table = "materias";
    protected $fillable = ['user_id','title','description','status'];

    public function user (){
        return $this->belongsTo(User::class,'user_id');
    }
}
