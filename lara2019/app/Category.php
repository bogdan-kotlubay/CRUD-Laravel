<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
	protected $fillable = ['title','parent_id','description'];

    public function category() {
        return $this->hasOne('App\Category', 'parent_id', 'id');
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

        public static function add($fields)
    {
        $category = new static;
        $category->fill($fields);
        $category->save();

        return $category;
    }

    public function edit($fields) {
        $this->fill($fields);
        $this->save();
    }


    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function getImage()
    {

        if($this->image !== null ) {
            return '/images/categories/'.$this->image;
        } else {
            return '/images/'.'nofoto.png';
        }
    }

    public function uploadImage($image)
    {
        if($image == null) { return; }
        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('images/categories/', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function removeImage()
    {
        if($this->image !== null) {
            Storage::delete('images/categories/'.$this->image);
        }
    }

}
