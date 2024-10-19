<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'ad_type',
        'start_date',
        'end_date',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
