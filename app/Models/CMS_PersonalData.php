<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMS_PersonalData extends Model
{
    protected $table = 'cms_personal_data';
    protected $fillable = ['title', 'description'];
}
