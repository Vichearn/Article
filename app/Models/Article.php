<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $uploads = '/images/' ;
    protected $fillable = ['image_file'] ;
}
