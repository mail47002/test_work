<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function translate($locale = 'uk')
    {
        $locale = $locale ?? app()->getLocale();
        return $this->hasOne(CategoryTranslate::class)->where('locale', $locale);
    }

    public function products(){
        return $this->belongsToMany('App\Product');
    }
}