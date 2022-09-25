<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMS_Delivery extends Model
{
    protected $table = 'cms_delivery';
    protected $fillable = ['title', 'description'];
}
