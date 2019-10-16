<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
   use Sluggable;
   protected $fillable = ['title'];

   public function products()
    {
    	return $this->belongsToMany(
    		Product::class,
    		'products_tags',
    		'product_id',
    		'tag_id'

    	);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ]; 
    }
}
