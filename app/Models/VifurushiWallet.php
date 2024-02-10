<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VifurushiWallet extends Model
{
    use HasFactory;
    protected $fillable = [
        'Wakala_code',
        'Purchased_vifurushi',
        'Sold_vifurushi',
        'Credit_vifurushi',
        'Vifurushi_balance',
        'Offer_Vifurushi',
        'expiredate',
        'kifurushi_id',
    ];
}
