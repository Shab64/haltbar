<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMS_OrderProcess extends Model
{
    protected $table = 'cms_order_process';
    protected $fillable = ['title', 'description'];
}
