<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = ['id', 'child_category_id', 'statut', 'title', 'company_id', 'specification',
        'Technical_sheet', 'colors', 'quantity', 'price', 'created_at'];

    public function childcategory()
    {
        return $this->belongsTo(Child_category::class,'child_category_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
    public function images()
    {
        return $this->hasMany(Products_image::class,'article_id');
    }
    public function colors()
    {
        return $this->hasMany(Color::class,'product_id');
    }
}