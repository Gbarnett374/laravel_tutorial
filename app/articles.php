<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
   protected $fillable = [
   	'title',
   	'body',
   	'published_at'
   ];
}
