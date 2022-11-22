<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'intro',
        'name',
        'designation',
        'resume',
        'title',
        'short_desc',
        'long_desc',
        'resume',
        'image',
        'phone',
        'email',
        'github',
        'linkedin',
        'facebook',
        'twitter',
        'instagram',
        'google',
        'youtube',
        'whatsup',
        'skype',
        'created_by',
        'updated_by',
    ];
    use HasFactory;
}
