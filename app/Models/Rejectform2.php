<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rejectform2 extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id','to_whom','tugallangan_id','comment',
    ];
    public function user()  
        {
            return $this->belongsTo(Tugallangan::class);
        }
}
