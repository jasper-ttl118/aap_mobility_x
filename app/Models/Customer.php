<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_firstname',
        'customer_middlename', 
        'customer_surname',
        'customer_email', 
        'customer_organization',
        'customer_mobile_number'
    ];

    
}
