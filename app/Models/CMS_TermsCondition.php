<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMS_TermsCondition extends Model
{
    protected $table = 'cms_terms_condition';
    protected $fillable = ['title', 'description'];
}
