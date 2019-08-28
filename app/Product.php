<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{

    protected $table = 'products';

    public function translate($locale = 'uk')
    {
        $locale = $locale ?? app()->getLocale();
        return $this->hasOne(ProductTranslate::class)->where('locale', $locale);
    }

    public function attributes(){
        return $this->belongsToMany('App\Attribute');
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

}
