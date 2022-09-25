<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMS_About extends Model
{
    protected $table = 'cms_about';
    protected $fillable = ['title', 'description'];
}
