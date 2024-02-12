<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class setting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'application_name',
        'short_description',
        'color_one',
        'color_two',
        'color_three',
        'color_four',
        'facebook_link',
        'instagram_link',
        'gsc',
        'site_index',
        'email',

    ];
}