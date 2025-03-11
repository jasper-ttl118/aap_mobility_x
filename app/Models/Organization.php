<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{   
    public $timestamps = false;
    protected $primaryKey = 'org_id';
    protected $fillable = [
        'org_name', 
        'org_description', 
        'org_logo', 
        'org_status'];
}
