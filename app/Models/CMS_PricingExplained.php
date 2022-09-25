<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMS_PricingExplained extends Model
{
    protected $table = 'cms_pricing_explained';
    protected $fillable = ['title', 'description'];
}
