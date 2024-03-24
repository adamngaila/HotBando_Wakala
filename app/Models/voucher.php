<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    use HasFactory;
    protected $fillable = [
        'voucher_id',
        'batch_id',
        'wakala_code',
        'voucher_code',
        'voucher_value',
        'status',
        'used_by',
        'used_when',
       
    ];

}
