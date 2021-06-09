<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table="categories";
    public $fillable=['id','name','created_at'];
    use HasFactory;
}