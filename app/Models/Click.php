<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $fillable = ['url', 'element_id', 'element_class', 'ip_address', 'session_id'];
}
