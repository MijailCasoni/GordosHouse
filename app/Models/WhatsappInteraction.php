<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsappInteraction extends Model
{
    protected $fillable = ['event_type', 'phone_number', 'message', 'ip_address', 'session_id'];
}
