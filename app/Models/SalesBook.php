<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'Wakala_code',
        'Sales_id',
        'Customer_id',
        'Customer_phone',
        'Package_type',
        'Amount',
        'Payment_Type',
        'Authorization_Status',
    ];
}
