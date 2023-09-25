<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userbid extends Model
{
    use HasFactory;
    protected $table = 'userbid';
    protected $fillable = [
        'job_link',
        'client_name',
        'up_id',
        'reply',
        'budget',
        'date',
        'userid'
    ];
}
