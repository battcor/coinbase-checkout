<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public const STATUS_FAILED = 0;
    public const STATUS_SUCCESSFUL = 1; 
    public const STATUS_PENDING = 2;

    protected $fillable = [
        'email',
        'amount',
        'exchange',
        'exchange_charge_id',
        'status',
    ];

}
