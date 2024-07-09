<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CFPGPayment extends Model
{
    use HasFactory;

    protected $table = 'cfpgpayments';

    protected $fillable = [
        'name',
        'mobile',
        'email',
        'amount',
        'purpose',
        'payment_request_id',
        'payment_link',
        'payment_status',
        'payment_id',
    ];
}
