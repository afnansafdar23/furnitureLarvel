<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;
    protected $fillable = [
        'name',
        'sku',
        'description',
        'features',
        'price',
        'discounted_price',
        'parent_category_id',
        'child_category_id',
        'color_id',
        'product_length',
        'product_weight',
        'product_height',
        'product_width',
        'availability'
        ];

        public function childCategory()
        {
            return $this->belongsTo(ChildCategory::class,'child_category_id');
        }
        public function parentCategory()
        {
            return $this->belongsTo(parentCategory::class,'parent_category_id');
        }
}
