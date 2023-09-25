<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userfinalmonthreport extends Model
{
    use HasFactory;
    protected $table = 'usersfinalmonth';
    protected $fillable = [
        'userid',
        'month_name',
        'bus_target',
        'total_bus',
        'verify_report',
        'read_status'
    ];
}
