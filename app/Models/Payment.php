<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;


    protected $fillable = [
        'seller_id',
        'amount',
        'payment_status',
        'transaction_id',
    ];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
    // public function subscription()
    // {
    //     return $this->belongsTo(Subscription::class);
    // }
}
