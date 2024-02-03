<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;

class order extends Model
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $fillable = [
        'order_no',
        'product_id',
        'totalprice',
        'quantity',
        'size',
        'color',
        'userid',
        'Address',
        'delivery_status',
        'payment_method',
        'payment_status',
        'update_payment_status'

    ];
}
