<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VifurushiTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'Transaction_id',
        'Wakala_code',
        'Transaction_type',
        'Value',
        'Amount',
        'Transaction_request_id',
        'Transaction_reference',
        'Transaction_status',
    ];
}
