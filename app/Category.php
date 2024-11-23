<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    
    public function sub_categories(){
        return $this->hasMany(\App\Sub_Category::class);
    }

    public function brands(){
        return $this->hasMany(Brand::class);
    }
}
