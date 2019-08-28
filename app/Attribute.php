<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Attribute extends Model
{
    protected $table = 'attributes';

    public function translate($locale = 'uk')
    {
        $locale = $locale ?? app()->getLocale();
        return $this->hasOne(AttributeTranslate::class)->where('locale', $locale);
    }

}
