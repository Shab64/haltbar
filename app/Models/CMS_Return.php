<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMS_Return extends Model
{
    protected $table = 'cms_return';
    protected $fillable = ['title', 'description'];
}
