<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registery extends Model
{
    use HasFactory;
    protected $fillable =[
        'text' ,'probabilities' , 'predicted_class','user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
