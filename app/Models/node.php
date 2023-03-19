<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class node extends Model
{
    use HasFactory;
    protected $fillable = [
        "cate_id",
        "temperature",
        "pressure",
        "altitude_sea",
        "altitude_cm",
    ];
}
