<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
	use Sluggable;

	protected $fillable = ['title','cat_id','short_desc','description'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'cat_id', 'id');
    }

    public function tags()
    {
    	return $this->belongsToMany(
    		Tag::class,
    		'products_tags',
    		'product_id',
    		'tag_id'

    	);
    }

    public function decisions()
    {
        return $this->belongsTo(
            Decision::class,
            'decision_products',
            'decision_id',
            'product_id'

        );
    }

    public function projects()
    {
        return $this->belongsTo(
            Project::class,
            'project_products',
            'project_id',
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
    	$product = new static;
    	$product->fill($fields);
    	$product->save();

    	return $product;
    }

    public function edit($fields)
    {
    	$this->fill($fields);
    	$this->save();
    }

    public function remove()
    {
        $this->removeImage();
    	$this->delete();
    }

    public function setCategory($id)
    {
        if($id == null) {return;}
        $this->cat_id = $id;
        $this->save();
    }

    public function setTags($ids)
    {
        if($ids == null) {return;}
    	$this->tags()->sync($ids);
    }

    public function uploadImage($image)
    {
        if($image == null) { return; }
        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('images/products/', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
    	
    	if($this->image !== null ) {
    		return '/images/products/'.$this->image;
    	} else {
    		return '/images/'.'nofoto.png';
    	}
    }

    public function removeImage()
    {
        if($this->image !== null) {
            Storage::delete('images/products/'.$this->image);
        }
    }
    public function getCategoryID()
    {
        return $this->category != null ? $this->category->id : null;
    }

    public function getCategoryTitle()
    {
        return ($this->category != null)
            ?   $this->category->title
            :   'Нет категории';
    }
}
