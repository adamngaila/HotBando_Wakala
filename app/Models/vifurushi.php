<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vifurushi extends Model
{
    use HasFactory;

    protected $fillable = [
        'Description',
        'value',
        'amount',
        'target_user',
        'status',
        'expiration',
];
}
