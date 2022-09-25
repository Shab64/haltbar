<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMS_Artwork extends Model
{
    protected $table = 'cms_artwork';
    protected $fillable = ['title', 'description'];
}
