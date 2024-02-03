<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParentCategory extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
    'name',
    'description'
    ];

    public function childCategories(){
        return $this->hasMany(ChildCategory::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'parent_category_id');
    }
}
