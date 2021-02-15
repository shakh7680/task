<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugallangan extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id', 'file1', 'file2', 'file3', 'optic', 'aloqa', 'obyekt', 'viloyat', 'sent'
    ];
    public function user()  
        {
            return $this->belongsTo(User::class);
        }
    public function surov()  
    {
        return $this->belongsTo(Surov::class);
    }
}
