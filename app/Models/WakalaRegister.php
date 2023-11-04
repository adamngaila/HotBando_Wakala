<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WakalaRegister extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'User_id',
        'Wakala_code',
        'Wakala_commission',
        'Contract',
        'Status',
        'Jumla_mauzo',
        'wakala_mapato',
        'Target_Sales',
    ];
}
