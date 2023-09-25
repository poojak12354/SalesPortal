<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usermonthlybid extends Model
{
    use HasFactory;
    protected $table = 'usermonthlybid';
    protected $fillable = [
        'userid',
        'user_mnthf_id',
        'client_name',
        'up_id',
        'total_bus',
        'bus_target'
    ];
    public function usermonth()
    {
        return $this->belongsTo('App\Models\Userfinalmonthreport');
    }
}
