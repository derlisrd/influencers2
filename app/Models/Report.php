<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = "reports";
    protected $fillable = ['user_id','domain_id','impressions','clicks','ctr','revenue','cpm','date','criteria_value','criteria_name'];


    public function user (){
        return $this->belongsTo(User::class,'user_id');
    }
}
