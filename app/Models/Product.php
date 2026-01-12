<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model implements HasMedia
{

use HasFactory ,InteractsWithMedia;
 protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id',
    ];




    public function category()
    {
        return $this->belongsTo(category::class);
    }



}
