<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemLogs extends Model
{
    use HasFactory;
    protected $fillable = [
        'User_id',
        'Description',
        'Status',

    ];
}
