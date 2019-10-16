<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;

class Faq extends Model
{
    use Sluggable;
    protected $fillable = ['title','text'];

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
        $faq = new static;
        $faq->fill($fields);
        $faq->save();

        return $faq;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->removeFile();
        $this->delete();
    }
    public function removeFile()
    {
        if($this->file !== null) {
            Storage::delete('uploads/faqs/'.$this->file);
        }
    }

    public function uploadFile($file)
    {
        if($file == null) { return; }
        $this->removeFile();
        $filename = str_random(10) . '.' . $file->extension();
        $file->storeAs('uploads/faqs/', $filename);
        $this->file = $filename;
        $this->save();
    }


}
