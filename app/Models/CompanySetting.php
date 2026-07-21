<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    protected $fillable = [
        'company_name',
        'logo',
        'favicon',
        'about',
        'address',
        'phone',
        'email',
        'website',
        'facebook',
        'linkedin',
        'youtube',
        'footer_text',
    ];
}
