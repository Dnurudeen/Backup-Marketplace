<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id',
        'image_path',  // Assuming the image path is stored in this field
    ];

    /**
     * Get the item that owns the image.
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
