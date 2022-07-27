<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mst_customers extends Model
{
    public $timestamps = false;
    protected $fillable = [
      'customer_name', 'email', 'tel_num', 'address'
    ];
    protected $primaryKey = 'customer_id';
    protected $table = 'mst_customers';
}
