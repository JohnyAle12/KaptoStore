<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TransactionRole extends Pivot
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'role_transaction';
    protected $fillable = [
        'transaction_id', 'role_id'
    ];
}
