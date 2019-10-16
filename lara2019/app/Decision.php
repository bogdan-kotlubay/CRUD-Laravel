<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;

class Decision extends Model
{
	use Sluggable;

	protected $fillable = ['title','product_id','short_desc','description'];

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'decision_products',
            'decision_id',
            'product_id'

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

    public static function add($fields)
    {
    	$decision = new static;
    	$decision->fill($fields);
    	$decision->save();

    	return $decision;
    }

    public function edit($fields)
    {
    	$this->fill($fields);
    	$this->save();
    }

    public function setProducts($ids)
    {
        if($ids == null) {return;}
        $this->products()->sync($ids);
    }


    public function remove()
    {
        $this->removeImage();
    	$this->delete();
    }

    public function uploadImage($short_image)
    {
        if($short_image == null) { return; }
        $this->removeImage();
        $filename = str_random(10) . '.' . $short_image->extension();
        $short_image->storeAs('images/decisions/', $filename);
        $this->short_image = $filename;
        $this->save();
    }

    public function uploadBigImage($image)
    {
        if($image == null) { return; }
        $this->removeImage();
        $filename = str_random(10) . 'BIG.' . $image->extension();
        $image->storeAs('images/decisions/', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
    	
    	if($this->short_image !== null ) {
    		return '/images/decisions/'.$this->short_image;
    	} else {
    		return '/images/'.'nofoto.png';
    	}
    }

    public function getBigImage()
    {

        if($this->image !== null ) {
            return '/images/decisions/'.$this->image;
        } else {
            return '/images/'.'nofoto.png';
        }
    }

    public function removeImage()
    {
        if($this->image !== null) {
            Storage::delete('images/decisions/'.$this->image);
        }
    }
}
