<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
   protected $fillable = [
    'title',
    'body',
    'published_at'
   ];

   //The line below will tell laravel to treat the published_at timestamp as a Carbon Instance. THis will allow us to call a bunch of cool functions on the date.
   protected $dates = ['published_at'];
/**
 * Gets the published articles. 
 */
   function scopePublished($query)
   {
        $query->where('published_at', '<=', Carbon::now()); 
   }
/**
 * Gets the unpublsihed articles. 
 */
   function scopeUnpublished($query)
   {
        $query->where('published_at', '>', Carbon::now()); 
   }

   function setPublishedAtAttribute($date)
   {
        //Sets date and timestamp to midnight. 
        $this->attributes['published_at'] = Carbon::parse($date);
        //Will set the timestamp as well, some databases will only set the date. 
        // $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d',$date);

   }
}
