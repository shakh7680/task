<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resend extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id','surov_id','to_whom','comment',
    ];
    public function user()  
        {
            return $this->belongsTo(User::class);
        }
}
