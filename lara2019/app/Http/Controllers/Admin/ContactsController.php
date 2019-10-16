<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    public function index()
    {
    	$contacts = Contact::all();
    	return view('admin.contacts.index', ['contacts'	=>	$contacts]);
    }

    public function create()
    {
        $contacts = Contact::all();
        return view('admin.contacts.create', ['contacts'=>	$contacts]);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title'	=>	'required', //обязательно
            'description'   =>  'required',
            'phonenumber' => 'required'
    	]);
    	$contacts = Contact::add($request->all());
    	return redirect()->route('contacts.index');
    }

    public function edit($id)
    {
    	$contacts = Contact::find($id);
        return view('admin.contacts.edit', ['contacts'=>	$contacts]);
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'title'	=>	'required', //обязательно
            'description' => 'required',
            'phonenumber' => 'required'
    	]);

    	$contact = Contact::find($id);

        $contact->update($request->all());

    	return redirect()->route('contacts.index');
    }

    public function destroy($id)
    {
    	Contact::find($id)->delete();
    	return redirect()->route('contacts.index');
    }
}
