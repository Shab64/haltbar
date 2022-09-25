<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMS_PrintMethod extends Model
{
    protected $table = 'cms_print_method';
    protected $fillable = ['title', 'description'];
}
