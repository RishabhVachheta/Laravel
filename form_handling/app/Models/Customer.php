<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customers";
    protected $primaryKey = "customer_id";
    protected $guarded = [];

    // the mutator is use to change the value when setting the data means set the data
    public function setNameAttribute($value)
    {
        $this->attributes["name"] = ucwords($value);
    }
    // the accessor is use to change the value when accessing the data means get the data
    public function getDobAttribute($value)
    {
        return date("d-M-Y", strtotime($value));
    }
}
