<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mst_imports extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'email', 'tel_num', 'address'
    ];
    protected $primaryKey = 'id';
    protected $table = 'mst_imports';
}
