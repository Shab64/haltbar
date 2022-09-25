<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMS_privacy extends Model
{
    protected $table = 'cms_privacy';
    protected $fillable = ['title', 'description'];
}
