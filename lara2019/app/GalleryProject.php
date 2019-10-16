<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GalleryProject extends Model
{
    protected $fillable = ['title','gallery_image'];

    public function projects()
    {
        return $this->belongsTo(
            Project::class,
            'projects_galleries',
            'project_id',
            'gallery_id'

        );
    }

    public static function add($fields)
    {
        $galleryproject = new static;
        $galleryproject->fill($fields);
        $galleryproject->save();

        return $galleryproject;
    }

    public function uploadImage($gallery_image)
    {
        if($gallery_image == null) { return; }
        $this->remove_gallery_image();
        $filename = str_random(10) . '.' . $gallery_image->extension();
        $gallery_image->storeAs('images/galleryprojects/', $filename);
        $this->gallery_image = $filename;
        $this->save();
    }

    public function remove()
    {
        $this->remove_gallery_image();
        $this->delete();
    }

    public function remove_gallery_image()
    {
        if($this->gallery_image !== null) {
            Storage::delete('images/galleryprojects/'.$this->gallery_image);
        }
    }

}


