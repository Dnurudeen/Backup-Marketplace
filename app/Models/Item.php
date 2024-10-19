<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'name', 'description', 'price', 'category_id', 'condition', 'user_id', 'images'
        'category_id', 'user_id', 'location', 'youtube_link', 'name',
        'item_type', 'model', 'manufaction_year', 'make', 'condition', 'exchange_possible',
        'description', 'price', 'negotiable', 'images', 'click_count',
    ];

    protected $casts = [
        'images' => 'array', // Cast the images field as an array
        'exchange_possible' => 'boolean',
        'negotiable' => 'boolean',
    ];

    public function seller()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
    public function clicks()
    {
        return $this->hasMany(Click::class);
    }
}
