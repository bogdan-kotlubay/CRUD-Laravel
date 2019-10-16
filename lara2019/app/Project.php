<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;

class Project extends Model
{
	use Sluggable;

	protected $fillable = ['title','product_id','short_desc','description'];

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'projects_products',
            'project_id',
            'product_id'

        );
    }

    public function galleries()
    {
        return $this->belongsToMany(
            GalleryProject::class,
            'projects_galleries',
            'project_id',
            'gallery_id'

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
    	$project = new static;
    	$project->fill($fields);
        $project->save();

    	return $project;
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

    public function setGalleries($ids)
    {
        if($ids == null) {return;}
        $this->galleries()->sync($ids);
    }


    public function remove()
    {
        $this->remove_short_image();
        $this->remove_image();
        $this->remove_client_image();
    	$this->delete();
    }

    public function uploadImage($image)
    {
        if($image == null) { return; }
        $this->remove_image();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('images/projects/', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function uploadShortImage($short_image)
    {
        if($short_image == null) { return; }
        $this->remove_short_image();
        $filename = str_random(10) . 'short.' . $short_image->extension();
        $short_image->storeAs('images/projects/', $filename);
        $this->short_image = $filename;
        $this->save();
    }

    public function uploadClientImage($client_image)
    {
        if($client_image == null) { return; }
        $this->remove_client_image();
        $filename = str_random(10) . 'client.' . $image->extension();
        $client_image->storeAs('images/project/', $filename);
        $this->client_image = $filename;
        $this->save();
    }

    public function getImage()
    {
    	
    	if($this->short_image !== null ) {
    		return '/images/projects/'.$this->short_image;
    	} else {
    		return '/images/'.'nofoto.png';
    	}
    }

    public function getBigImage()
    {
        if($this->client_image !== null ) {
            return '/images/projects/'.$this->client_image;
        } else {
            return '/images/'.'nofoto.png';
        }
    }

    public function remove_short_image()
    {
        if($this->short_image !== null) {
            Storage::delete('images/projects/'.$this->short_image);
        }
    }
    public function remove_image()
    {
        if($this->image !== null) {
            Storage::delete('images/projects/'.$this->image);
        }
    }

    public function remove_client_image()
    {
        if($this->client_image !== null) {
            Storage::delete('images/projects/'.$this->client_image);
        }
    }
}
