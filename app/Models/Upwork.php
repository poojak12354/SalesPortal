<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upwork extends Model
{
    use HasFactory;
    protected $table = 'upwork';
    protected $fillable = [
        'name',
        'profile_link'
    ];
}
