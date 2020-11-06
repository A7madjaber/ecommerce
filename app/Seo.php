<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    public function getNameAttribute($value){

        return ucfirst($value);

    }

    protected $table= 'seo';

protected $fillable=[
    'meta_title',
    'meta_author',
    'meta_tag',
    'meta_description',
    'google_analytics',
    'bing_analytics',
];
}
