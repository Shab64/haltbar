<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMS_Cookies extends Model
{
    protected $table = 'cms_cookies';
    protected $fillable = ['title', 'description'];
}
