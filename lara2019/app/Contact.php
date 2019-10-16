<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Contact extends Model
{
	protected $fillable = ['title','description','phonenumber'];

	public static function add($fields)
    {
        $contact = new static;
        $contact->fill($fields);
        $contact->save();

        return $contact;
    }

    public function edit($fields) {
        $this->fill($fields);
        $this->save();
    }

}
