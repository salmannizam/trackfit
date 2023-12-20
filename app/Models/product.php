<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';
     protected $fillable = [
        'name',
        'quantity',
        'slug',
        'description',
        'OriginalPrice',
        'OfferPrice',
        'category_id',
        'image',
        'status',
    ];
    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
