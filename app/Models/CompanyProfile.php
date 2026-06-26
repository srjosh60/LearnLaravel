<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'company_name',
        'description',
        'vision',
        'mission',
        'address',
        'phone',
        'email',
        'instagram',
        'logo',
    ];
}