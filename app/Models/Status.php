<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        // 'deleted_at'
    ];

    protected $hidden = [
        // 'deleted_at',
    ];

    protected $casts = [
        // 'deleted_at'=>'datetime',
    ];
    
}
