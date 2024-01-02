<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'description', 'sender_id', 'recipient_id','predicted_class','rates'
    ];
    public function recipient()
    {
        return $this->belongsTo(User::class,'recipient_id','id');
    }
    public function sender()
    {
        return $this->belongsTo(User::class,'sender_id','id');
    }
}
