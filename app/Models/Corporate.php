<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corporate extends Model
{
    use HasFactory;
    protected $primaryKey = 'customer_id';
    public $timestamps = false;
    protected $fillable = [
        'customer_firstname',
        'customer_middlename', 
        'customer_surname',
        'customer_email', 
        'customer_organization',
        'customer_mobile_number',
        'customer_birthdate',
        'customer_status'
    ];

    
}
