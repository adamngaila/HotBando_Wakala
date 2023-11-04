<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'Wakala_code',
        'Customer_id',
        'Transaction_id',
        'Sales_id',
        'transaction_type',
        'Credit',
        'Cash',
        'Amount',
        'Commission',
        'transaction_status'
    ];
}

