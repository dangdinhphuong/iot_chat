<?php

namespace App\Models;
use  App\Models\node;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    
    public function latestNode()
    {
        return $this->hasOne(node::class, 'cate_id')->latest();
    }
}
